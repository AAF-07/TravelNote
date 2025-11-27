<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TravelNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelNoteController extends Controller
{
    public function ShowLogin(){
        $config = User::first();
        return view('config.index');
    }

    public function login(Request $req){
        $req->validate([
            'nik' => 'required',
            'nama' => 'required',
        ]);

        return redirect()->route('travel.index')->with('success', 'config disimpan');
    }
    public function logout(){
        return redirect()->route('config.show')->with('success', 'logout berhasil');
    }
    public function ShowRegis(){
        return view('config.regis');
    }

    public function index(){
        $config = User::all();
        $rows = TravelNote::all();
        return view('travel.index', compact('config', 'rows'));
    }

    public function create(){
        return view('travel.create');
    }
    public function store(Request $req){
        $req->validate([
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        TravelNote::create([
            'date' => $req->date,
            'location' => $req->location,
            'description' => $req->description,
        ]);

        return redirect()->route('travel.index')->with('success', 'data berhasil disimpan');
    }

    public function edit($id){
        $row = TravelNote::findOrFail($id);
        return view('travel.edit', compact('row'));
    }
    public function update(Request $req, $id){
        $req->validate([
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $row = TravelNote::findOrFail($id);
        $row->update([
            'date' => $req->date,
            'location' => $req->location,
            'description' => $req->description,
        ]);

        return redirect()->route('travel.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy($id){
        $row = TravelNote::findOrFail($id);
        $row->delete();

        return redirect()->route('travel.index')->with('success', 'data berhasil dihapus');
    }
}
