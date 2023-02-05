<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderModel as Slider;
use App\Models\ArtikelModel as Artikel;

class SliderController extends Controller
{
    public function index()
    {
		$title  = 'Slider | Admin';
		$page   = 'slider';
		$slider = Slider::getData();

		return view('Pengurus.Admin.page.slider.main',compact('title','page','slider'));
    }

    public function tambah()
    {
		$title   = 'Form Slider | Admin';
		$page    = 'slider';
		$artikel = Artikel::getData();
    	return view('Pengurus.Admin.page.slider.form-slider',compact('title','page','artikel'));
    }

    public function edit($id)
    {
		$title = 'Form Slider | Admin';
		$page  = 'slider';
		$row   = Slider::where('id_slider',$id)->firstOrFail();
		$artikel = Artikel::getData();

		return view('Pengurus.Admin.page.slider.form-slider',compact('title','page','row','artikel'));
    }

    public function delete($id)
    {
    	Slider::where('id_slider',$id)->delete();

    	return redirect('/admin/data-slider')->with('message','Berhasil Hapus Kategori');
    }

    public function save(Request $request)
    {
		$artikel   = $request->artikel;
		$id_slider = $request->id_slider;

		if ($id_slider == '') {
			Slider::create(['id_artikel'=>$artikel]);

			$message = 'Berhasil Input Slider';
		}
		else {
			Slider::where('id_slider',$id_slider)
							->update(['id_artikel' => $artikel]);

			$message = 'Berhasil Update Slider';
		}

		return redirect('/admin/data-slider')->with('message',$message);
    }
}
