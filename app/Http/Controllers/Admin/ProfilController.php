<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfilModel as Profil;

class ProfilController extends Controller
{
    public function tentangKami() {
    	$title = 'Tentang Kami | Admin';
    	$data = Profil::where('menu','tentang-kami')->get();
        $page = 'tentang-kami';
        $active = 'active';
    	return view('Pengurus.Admin.page.profil.tentang.main',compact('title','data','page','active'));
    }

    public function tambahTentangKami() {
        $title = 'Form Tentang Kami | Admin';
        $page = 'tentang-kami';
        $active = 'active';
        return view('Pengurus.Admin.page.profil.tentang.form-tentang',compact('title','page','active'));
    }

    public function editTentangKami($id) {
        $title = 'Form Tentang | Admin';
        $page = 'tentang-kami';
        $active = 'active';
        $row = Profil::where('id_profil',$id)->where('menu','tentang-kami')->firstOrFail();
        return view('Pengurus.Admin.page.profil.tentang.form-tentang',compact('title','row','page','active'));
    }

    public function pendidikan() {
        $title = 'Pendidikan | Admin';
        $page = 'pendidikan';
        $active = 'active';
        $data = Profil::where('menu','pendidikan')->get();
        return view('Pengurus.Admin.page.profil.pendidikan.main',compact('title','data','page','active'));
    }

    public function tambahPendidikan() {
        $title = 'Form Pendidikan | Admin';
        $page = 'pendidikan';
        $active = 'active';
        return view('Pengurus.Admin.page.profil.pendidikan.form-pendidikan',compact('title','page','active'));
    }

    public function editPendidikan($id) {
        $title = 'Form Pendidikan | Admin';
        $page = 'pendidikan';
        $active = 'active';
        $row = Profil::where('id_profil',$id)->where('menu','pendidikan')->firstOrFail();
        return view('Pengurus.Admin.page.profil.pendidikan.form-pendidikan',compact('title','row','page','active'));
    }

    public function delete($menu,$id) {
        Profil::where('menu',$menu)->where('id_profil',$id)->delete();
        return redirect('/admin/data-menu-'.$menu)->with('message','Berhasil Hapus');
    }

    public function save(Request $request) {
        $judul   = $request->judul_profil;
        $halaman = $request->halaman != '' ? $request->halaman : '-';
        $konten  = $request->konten;
        $menu    = $request->menu;
        $id      = $request->id_profil;
        $array = [
            'judul_profil' => $judul,
            'halaman'      => $halaman,
            'konten'       => $konten,
            'menu'         => $menu
        ];

        if ($id == '') {
            Profil::create($array);
            $message = 'Berhasil Input Data';
        } else {
            Profil::where('id_profil',$id)->update($array);
            $message = 'Berhasil Update Data';
        }
        return redirect('/admin/data-menu-'.$menu)->with('message',$message);
    }
}
