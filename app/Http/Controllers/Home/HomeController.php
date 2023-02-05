<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfilModel as Profil;
use App\Models\ArtikelModel as Artikel;
use App\Models\SliderModel as Slider;
use App\Models\KategoriArtikelModel as KategoriArtikel;
use App\Models\VisitorModel as Visitor;
use App\Models\InfoFooterModel as InfoFooter;
use App\Models\StreamingModel as Streaming;
use App\Models\JadwalStreamingModel as JadwalStreaming;

class HomeController extends Controller
{
    public function index() {
        $title   = 'Beranda';
        // $artikel = Artikel::getData();
    	// return view('Main.home',compact('artikel'));
        $popular_artikel = Artikel::getPopularArticle();
        $popular_tag     = KategoriArtikel::showPopularTag();
        $artikel         = Artikel::getNewestPost();
        $artikel_populer = Artikel::getFirstNewest();
        $slider          = Slider::getData();
        return view('Main.home',compact('title','popular_artikel','popular_tag','artikel','artikel_populer','slider'));
    }

    public function tentangKami($url) {
        $data = Profil::where('halaman',$url)->where('menu','tentang-kami')->firstOrFail();
    	$title = $data->judul_profil;
    	return view('Main.tentang-kami',compact('title','data'));
    }

    public function pendidikan($url) {
        $data  = Profil::where('halaman',$url)->where('menu','pendidikan')->firstOrFail();
        $title = $data->judul_profil;
        return view('Main.pendidikan',compact('title','data'));
    }

    public function artikel() {
        $title            = 'Artikel';
        $artikel          = Artikel::getDataPaginate();
        $kategori_artikel = new KategoriArtikel;
        $popular_artikel  = Artikel::getPopularArticle();
        $popular_tag      = KategoriArtikel::showPopularTag();

        return view('Main.artikel',compact('title','artikel','kategori_artikel','popular_artikel','popular_tag'));
    }

    public function artikelDetail($slug) {
        $data    = Artikel::getBySlug($slug);
        $related_post = new Artikel;
        $title   = $data->judul_artikel;
        $get = Visitor::where('id_artikel',$data->id_artikel)->where('ip_address',$_SERVER['REMOTE_ADDR']);
        if ($get->count() == 0) {
            Visitor::create(['id_artikel'=>$data->id_artikel,'ip_address'=>$_SERVER['REMOTE_ADDR']]);
            Artikel::where('id_artikel',$data->id_artikel)->update(['counter'=>$get->count()]);
        }
        KategoriArtikel::counter($data->slug_kategori);

        return view('Main.artikel-detail',compact('title','data','related_post'));
    }

    public function cariArtikel(Request $request) {
        $title            = 'Artikel';
        $s                = $request->cari;
        $artikel          = Artikel::cariArtikel($s);
        $kategori_artikel = new KategoriArtikel;
        $popular_artikel  = Artikel::getPopularArticle();
        $popular_tag      = KategoriArtikel::showPopularTag();

        return view('Main.artikel',compact('title','artikel','kategori_artikel','popular_artikel','popular_tag'));
    }

    public function artikelByKategori($slug_kategori)
    {
        $title            = 'Artikel';
        $artikel          = Artikel::getDataPaginate($slug_kategori);
        $kategori_artikel = new KategoriArtikel;
        $popular_artikel  = Artikel::getPopularArticle();
        $popular_tag      = KategoriArtikel::showPopularTag();

        $kategori_artikel->counter($slug_kategori);

        return view('Main.artikel',compact('title','artikel','kategori_artikel','popular_artikel','popular_tag'));
    }

    public function streaming()
    {
        $title            = 'Streaming';
        $jam_dari         = JadwalStreaming::where('tanggal_streaming',date('Y-m-d'))
                                            ->orderBy('dari','ASC');
        $streaming = '';
        if ($jam_dari->count() != 0) {
            
            $dari   = strtotime(convertTime($jam_dari->firstOrFail()->dari));
            $sampai = strtotime(convertTime($jam_dari->firstOrFail()->sampai));
            
            if (strtotime(date('H:i:s')) == $dari || strtotime(date('H:i:s')) <= $sampai) {
                $streaming = Streaming::getStreaming($jam_dari->firstOrFail()->dari);
            }
            else {
                $streaming = json_encode(['link_streaming' => '']);
                $streaming = json_decode($streaming);
            }
        }
        else {
            $streaming = json_encode(['link_streaming' => '']);
            $streaming = json_decode($streaming);
        }
        $jadwal_streaming = JadwalStreaming::where('tanggal_streaming',date('Y-m-d'))->get();
        return view('Main.streaming',compact('title','streaming','jadwal_streaming'));
    }

    public function penderesan()
    {
        $title      = 'Penderesan';
        $penderesan = Streaming::getPenderesan();

        return view('Main.penderesan',compact('title','penderesan'));
    }
}
