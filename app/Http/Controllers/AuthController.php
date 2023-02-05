<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function index() {
    	$title = 'Login Form';
    	return view('Pengurus.login',compact('title'));
    }

    public function login(Request $request) {
    	$username = $request->username;
    	$password = $request->password;
    	if (Auth::attempt(['username'=>$username,'password'=>$password,'status_delete'=>'0'],false)) {
    		if (Auth::user()->level==1) {
                User::lastLogin(Auth::id());
    			return redirect()->intended('/admin/dashboard');
    		}
    		elseif (Auth::user()->level==0) {
                User::lastLogin(Auth::id());
    			return redirect()->intended('/petugas/dashboard');
    		}
    		elseif (Auth::user()->status_akun==0) {
    			Auth::logout();
    			return redirect('/login-form')->with('log','Maaf Akun Anda Non Aktif');
    		}
    	} else {
    		return redirect('/login-form')->with('log','User Tidak Ada');
    	}
    	
    }

    public function user() {
    	$username = 'admin';
    	$password = 'admin';
    	$level = 1;
    	$nama = 'Administrator';
    	$status_akun = 1;
    	$array = [
    		'username' => $username,
    		'password' => bcrypt($password),
    		'level' => $level,
    		'nama' => $nama,
    		'status_akun' => $status_akun
    	];
    	if(User::create($array)) {
    		return response('Berhasil',200);
    	}
    }

    public function logout() {
    	Auth::check() ? Auth::logout() : '';
    	return redirect('/login-form');
    }
}
