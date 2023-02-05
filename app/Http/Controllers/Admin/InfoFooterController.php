<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InfoFooterModel as InfoFooter;

class InfoFooterController extends Controller
{
	public function infoAlamat() {
		$title = 'Info Alamat | Admin';
		$page = 'info-alamat';
		$info = 'active';
		$data = InfoFooter::where('keterangan','alamat')->get();
		return view('Pengurus.Admin.page.info-footer.info-alamat.main',compact('title','page','info','data'));
	}

	public function tambahInfoAlamat() {
		$title = 'Form Info Alamat | Admin';
		$page = 'info-alamat';
		$info = 'active';
		return view('Pengurus.Admin.page.info-footer.info-alamat.form-info-alamat',compact('title','page','info'));
	}

	public function editInfoAlamat($id) {
		$title = 'Form Info Alamat | Admin';
		$page = 'info-alamat';
		$info = 'active';
		$row = InfoFooter::where('keterangan','alamat')->where('id_info_footer',$id)->firstOrFail();
		return view('Pengurus.Admin.page.info-footer.info-alamat.form-info-alamat',compact('title','page','info','row'));
	}

	public function infoTautan() {
		$title = 'Info Tautan | Admin';
		$page = 'info-tautan';
		$info = 'active';
		$data = InfoFooter::where('keterangan','tautan')->get();
		return view('Pengurus.Admin.page.info-footer.info-tautan.main',compact('title','page','info','data'));
	}

	public function tambahInfoTautan() {
		$title = 'Form Info Tautan | Admin';
		$page = 'info-tautan';
		$info = 'active';
		return view('Pengurus.Admin.page.info-footer.info-tautan.form-info-tautan',compact('title','page','info'));
	}

	public function editInfoTautan($id) {
		$title = 'Form Info Pranala Luar | Admin';
		$page = 'info-tautan';
		$info = 'active';
		$row = InfoFooter::where('keterangan','tautan')->where('id_info_footer',$id)->firstOrFail();
		return view('Pengurus.Admin.page.info-footer.info-tautan.form-info-tautan',compact('title','page','info','row'));
	}

	public function infoSosmed() {
		$title = 'Sosmed | Admin';
		$page = 'info-sosmed';
		$info = 'active';
		$data = InfoFooter::where('keterangan','sosmed')->get();
		return view('Pengurus.Admin.page.info-footer.info-sosmed.main',compact('title','page','info','data'));
	}

	public function tambahInfoSosmed() {
		$title = 'Form Info Sosmed | Admin';
		$page = 'info-sosmed';
		$info = 'active';
		// $row = InfoFooter::where('keterangan','sosmed')->where('id_info_footer',$id)->firstOrFail();
		return view('Pengurus.Admin.page.info-footer.info-sosmed.form-info-sosmed',compact('title','page','info'));
	}

	public function editInfoSosmed($id) {
		$title = 'Form Info Sosmed | Admin';
		$page = 'info-sosmed';
		$info = 'active';
		$row = InfoFooter::where('keterangan','sosmed')->where('id_info_footer',$id)->firstOrFail();
		return view('Pengurus.Admin.page.info-footer.info-sosmed.form-info-sosmed',compact('title','page','info','row'));
	}

	public function delete($ktr,$id) {
		InfoFooter::where('keterangan',$ktr)->where('id_info_footer',$id)->delete();
		return redirect('/admin/info-footer/'.$ktr)->with('message','Berhasil Hapus Data Info '.$ktr);
	}

	public function save(Request $request) {
		$judul_info = $request->judul_info == '' ? '-' : $request->judul_info;
		$kelas_icon = $request->kelas_icon == '' ? '-' : $request->kelas_icon;
		$link_info  = $request->link_info == '' ? '-' : $request->link_info;
		$keterangan = $request->keterangan;
		$id         = $request->id;
		$array = [
			'judul_info' => $judul_info,
			'kelas_icon' => $kelas_icon,
			'link_info'  => $link_info,
			'keterangan' => $keterangan
		];
		if ($id == '') {
			InfoFooter::create($array);
			$message = 'Berhasil Input Info Footer '.$keterangan;
		}
		else {
			InfoFooter::where('id_info_footer',$id)->update($array);
			$message = 'Berhasil Update Info Footer '.$keterangan;
		}
		return redirect('/admin/info-footer/'.$keterangan)->with('message',$message);
	}
}
