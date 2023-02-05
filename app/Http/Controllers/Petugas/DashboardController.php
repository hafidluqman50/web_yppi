<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function dashboard() {
    	$title = 'Dashboard | Petugas';
    	$page = 'dashboard';
    	return view('Pengurus.Petugas.page.dashboard',compact('title','page'));
    }

    public function settings() {
        $title = 'Ubah Profil | Petugas';
        $data = User::where('id_users',Auth::id())->firstOrFail();
        return view('Pengurus.Petugas.page.ubah-profil',compact('title','data'));
    }

    public function updateProfile(Request $request) {
        $username    = $request->username;
        if ($username != '' && User::where('username',$username)->count() > 0) {
            return redirect('/petugas/ubah-profile')->with('log','Maaf Username Sudah Ada');
        }
        $password      = $request->password;
        $nama          = $request->nama;
            if ($username == '' && $password == '') {
                $array = [
                    'nama'        => $nama,
                ];
            }
            elseif($username == '') {
                $array = [
                    'password'    => bcrypt($password),
                    'nama'        => $nama,
                ];
            } 
            elseif($password == '') {  
                $array = [
                    'username'    => $username,
                    'nama'        => $nama,
                ];
            }
            else {
                $array = [
                    'username'    => $username,
                    'password'    => bcrypt($password),
                    'nama'        => $nama,
                ];
            }
            
        User::where('id_users',$id)->update($array);
        $message = 'Berhasil Ubah Profil';
        return redirect('/petugas/ubah-profile')->with('message',$message);
    }
}
