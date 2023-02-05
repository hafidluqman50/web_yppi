<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JadwalStreamingModel as JadwalStreaming;
use Auth;

class JadwalStreamingController extends Controller
{
	public function index()
	{
		$title = 'Jadwal Streaming | Admin';
		$page  = 'jadwal-streaming';
		$data  = JadwalStreaming::getData();

		return view('Pengurus.Admin.page.jadwal-streaming.main',compact('title','page','data'));
	}

	public function tambah()
	{
		$title = 'Form Jadwal Streaming | Admin';
		$page  = 'jadwal-streaming';

		return view('Pengurus.Admin.page.jadwal-streaming.form-jadwal-streaming',compact('title','page'));
	}

	public function edit($id)
	{
		$title = 'Form Jadwal Streaming | Admin';
		$page  = 'jadwal-streaming';
		$row   = JadwalStreaming::where('id_jadwal_streaming',$id)->firstOrFail();

		return view('Pengurus.Admin.page.jadwal-streaming.form-jadwal-streaming',compact('title','page','row'));
	}

	public function delete($id)
	{
		JadwalStreaming::where('id_jadwal_streaming',$id)
						->delete();

		return redirect('/admin/data-jadwal-streaming')->with('message','Berhasil Hapus Jadwal');
	}

	public function save(Request $request)
	{
		$tanggal_jadwal      = $request->tanggal_jadwal;
		$dari                = $request->dari;
		$sampai              = $request->sampai;
		$id_jadwal_streaming = $request->id_jadwal_streaming;

		$data_jadwal = [
			'tanggal_streaming' => $tanggal_jadwal,
			'dari'              => $dari,
			'sampai'            => $sampai,
			'id_users'          => Auth::id()
		];

		if ($id_jadwal_streaming == '') {
			JadwalStreaming::create($data_jadwal);

			$message = 'Berhasil Input Jadwal';
		}
		else {
			JadwalStreaming::where('id_jadwal_streaming',$id_jadwal_streaming)
							->update($data_jadwal);

			$message = 'Berhasil Update Jadwal';
		}

		return redirect('/admin/data-jadwal-streaming')->with('message',$message);
	}
}
