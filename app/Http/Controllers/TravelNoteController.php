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

        $user = User::where('nik', $req->nik)->where('name', $req->nama)->first();
        if(!$user){
            return redirect()->route('config.show')->with('error', 'nik atau nama salah');
        }
        session()->put('id', $user->id);

        return redirect()->route('travel.home')->with('success', 'config disimpan');
    }
    public function logout(){
        session()->forget('id');
        return redirect()->route('config.show')->with('success', 'logout berhasil');
    }

    public function ShowRegister(){
        return view('config.register');
    }
    public function register(Request $req){
        $req->validate([
            'nik'=>'required',
            'nama'=>'required'
        ]);

        user::create([
            'nik'=>$req->nik,
            'name'=>$req->nama
        ]);

        return redirect()->route('config.show')->with('success', 'register berhasil');
    }

    public function index(){

    if (!session()->has('id')) {
        return redirect()->route('config.show')->with('error', 'silakan login dulu');
    }

        $id = session()->get('id');
        $config = User::findOrFail($id);
        $rows = TravelNote::where('user_id', $id)->orderBy('date', 'desc')->get();
        return view('travel.index', compact('config', 'rows'));
    }
    public function home(){
        $id = session()->get('id');
        $config = User::findorfail($id);
        return view('travel.home', compact('config'));
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
            'user_id' => session()->get('id'),
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
