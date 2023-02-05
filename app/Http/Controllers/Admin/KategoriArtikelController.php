<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriArtikelModel as KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index()
    {
		$title            = 'Kategori Artikel | Admin';
		$page             = 'kategori-artikel';
		$kategori_artikel = KategoriArtikel::where('status_delete',0)->get();

    	return view('Pengurus.Admin.page.kategori-artikel.main',compact('title','page','kategori_artikel'));
    }

    public function tambah()
    {
    	$title = 'Form Kategori Artikel | Admin';
    	$page = 'kategori-artikel';

    	return view('Pengurus.Admin.page.kategori-artikel.form-kategori-artikel',compact('title','page'));
    }

    public function edit($id)
    {
		$title = 'Form Kategori Artikel | Admin';
		$page  = 'kategori-artikel';
		$row   = KategoriArtikel::where('id_kategori_artikel',$id)->where('status_delete',0)->firstOrFail();

		return view('Pengurus.Admin.page.kategori-artikel.form-kategori-artikel',compact('title','page','row'));
    }

    public function delete($id)
    {
    	KategoriArtikel::where('id_kategori_artikel',$id)->update(['status_delete'=>1]);

    	return redirect('/admin/data-kategori-artikel')->with('message','Berhasil Hapus Kategori');
    }

    public function save(Request $request)
    {
		$nama_kategori       = $request->nama_kategori;
		$slug_kategori		 = str_slug($nama_kategori,'-');
		$id_kategori_artikel = $request->id_kategori_artikel;

		if ($id_kategori_artikel == '') {
			KategoriArtikel::create(['nama_kategori'=>$nama_kategori,'slug_kategori'=>$slug_kategori]);

			$message = 'Berhasil Input Kategori';
		}
		else {
			KategoriArtikel::where('id_kategori_artikel',$id_kategori_artikel)
							->update(['nama_kategori' => $nama_kategori,'slug_kategori'=>$slug_kategori]);

			$message = 'Berhasil Update Kategori';
		}

		return redirect('/admin/data-kategori-artikel')->with('message',$message);
    }
}
