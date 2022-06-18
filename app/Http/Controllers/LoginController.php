<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('username','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }
        return redirect()->route('index')->with('error','Username Atau Password Anda Salah');
    }

    public function index(){
        
        return view('login',['footer'=>0]);
    }

    public function lupa_password(){
        
        return view('lupa_password',['footer'=>0]);

    }

    public function reset_password(Request $request){
        
        $password = Hash::make(12345678);

        if($request->reset == "AdminDishub2022"){
            DB::table('users')->where('id',2)->update([
                'password'=> $password
            ]);
            return back()->with('success','Password Telah Berhasil Di Reset, Passwordnya Silahkan Cek Di Buku Panduan');
        }else{
            return back()->with('error','Kode Reset Password Anda Salah');
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('index');
    }
}
