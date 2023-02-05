<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function users() {
    	$title = 'Data User | Admin';
    	$page = 'users';
    	$data = User::where('status_delete','0')->where('level','0')->get();
    	return view('Pengurus.Admin.page.users.main',compact('title','page','data'));
    }

    public function tambahUsers() {
    	$title = 'Data User | Admin';
    	$page = 'users';
    	return view('Pengurus.Admin.page.users.form-users',compact('title','page'));	
    }

    public function editUsers($id) {
    	$title = 'Data User | Admin';
    	$page = 'users';
    	$row = User::where('id_users',$id)->firstOrFail();
    	return view('Pengurus.Admin.page.users.form-users',compact('title','page','row'));	
    }

    public function statusAkun($id) {
        $get = User::where('id_users',$id);
        $first = $get->firstOrFail();
        if ($first->status_akun == 1) {
            $get->update(['status_akun'=>0]);
            $message = 'Berhasil Nonaktifkan Akun';
        } else {
            $get->update(['status_akun'=>1]);
            $message = 'Berhasil Aktifkan Akun';
        }
        return redirect('/admin/users')->with('message',$message);
    }

    public function delete($id) {
        User::where('id_users',$id)->update(['status_delete'=>'1']);
        // User::where('id_users',$id)->delete();
        return redirect('/admin/users')->with('message','Berhasil Hapus User');
    }

    public function save(Request $request) {
		$username    = $request->username;
		if ($username != '' && User::where('username',$username)->count() > 0) {
			return redirect('/admin/users')->with('log','Maaf Username Sudah Ada');
		}
        $password      = $request->password;
        $nama          = $request->nama;
        $level         = 0;
        $status_akun   = 1;
        $status_delete = 0;
        $id            = $request->id_users;
    	if ($id == '') {
            $array = [
                'username'      => $username,
                'password'      => bcrypt($password),
                'nama'          => $nama,
                'level'         => $level,
                'status_akun'   => $status_akun,
                'status_delete' => $status_delete,
            ];
    		User::create($array);
    		$message = 'Berhasil Input User';
    	} else {
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
    		$message = 'Berhasil Update User';
    	}
    	return redirect('/admin/users')->with('message',$message);
    }
}
