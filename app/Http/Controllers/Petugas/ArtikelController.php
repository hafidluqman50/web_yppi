<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArtikelModel as Artikel;
use App\Models\KategoriArtikelModel as KategoriArtikel;
use Auth;
use Image;

class ArtikelController extends Controller
{
    public function index()
    {
		$title = 'Artikel | Petugas';
		$page  = 'artikel';
		$data  = Artikel::getData();

		return view('Pengurus.Petugas.page.artikel.main',compact('title','page','data'));
    }

    public function tambah()
    {
		$title            = 'Form Artikel | Petugas';
		$page             = 'artikel';
		$kategori_artikel = KategoriArtikel::where('status_delete',0)->get();
    	return view('Pengurus.Petugas.page.artikel.form-artikel',compact('title','page','kategori_artikel'));
    }

    public function edit($id)
    {
		$title            = 'Form Artikel | Petugas';
		$page             = 'artikel';
		$row              = Artikel::where('id_artikel',$id)->firstOrFail();
		$kategori_artikel = KategoriArtikel::where('status_delete',0)->get();
        return view('Pengurus.Petugas.page.artikel.form-artikel',compact('title','page','kategori_artikel','row')); 
    }

    public function delete($id)
    {
        $get = Artikel::where('id_artikel',$id);
        $first = $get->firstOrFail();
        if ($first->foto_artikel != '-') {
            if(file_exists(public_path('assets/foto_artikel/'.$first->foto_artikel))){
                unlink(public_path('assets/foto_artikel/'.$first->foto_artikel));
            }
        }
        $get->delete();
        return redirect('/petugas/data-artikel')->with('message','Berhasil Hapus Artikel');
    }

    public function save(Request $request)
    { 
		$judul            = $request->judul_artikel;
		$tanggal          = $request->tanggal_artikel;
		$isi              = $request->isi_artikel;
		$kategori_artikel = $request->id_kategori_artikel;
		$foto             = $request->foto_artikel;
        // dd($kategori);
        if ($foto != '') {
            $img = Image::make($foto);
            $photo = uniqid('artikel_').'.jpg';
            $img->resize(1030,530);
            $img->save('assets/foto_artikel/'.$photo);
        }
        else {
            $photo = '-';
        }
        $id       = $request->id_artikel;
        if ($id == '') {
            $array = [
				'judul_artikel'       => $judul,
				'judul_slug_artikel'  => str_slug($judul,'-'),
				'tanggal_artikel'     => $tanggal,
				'foto_artikel'        => $photo,
				'isi_artikel'         => $isi,
				'id_kategori_artikel' => $kategori_artikel,
				'counter'             => 0,
				'id_users'            => Auth::id()
            ];
            Artikel::create($array);
            $message = 'Berhasil Input Artikel';
        } else {
            if ($foto != '') {
                $get = Artikel::where('id_artikel',$id)->firstOrFail()->foto_artikel;
                if (file_exists(public_path('assets/foto_'.$kategori.'/'.$get))) {
                    unlink(public_path('assets/foto_'.$kategori.'/'.$get));
                }
                $array = [
					'judul_artikel'       => $judul,
					'judul_slug_artikel'  => str_slug($judul,'-'),
					'tanggal_artikel'     => $tanggal,
					'foto_artikel'        => $photo,
					'isi_artikel'         => $isi,
					'id_kategori_artikel' => $kategori_artikel,
					'id_users'            => Auth::id()
                ];
            }
            else {
                $array = [
					'judul_artikel'       => $judul,
					'judul_slug_artikel'  => str_slug($judul,'-'),
					'tanggal_artikel'     => $tanggal,
					'isi_artikel'         => $isi,
					'id_kategori_artikel' => $kategori_artikel,
					'id_users'            => Auth::id()
                ];
            }
            Artikel::where('id_artikel',$id)->update($array);
            $message = 'Berhasil Update Artikel';
        }
        return redirect('/petugas/data-artikel')->with('message',$message);
    }
}
