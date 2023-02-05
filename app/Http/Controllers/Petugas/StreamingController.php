<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StreamingModel as Streaming;
use App\Models\JadwalStreamingModel as JadwalStreaming;
use Auth;

class StreamingController extends Controller
{
	public function index()
	{
		$title = 'Streaming | Petugas';
		$page  = 'streaming';
		$data  = Streaming::getData();

		return view('Pengurus.Petugas.page.streaming.main',compact('title','page','data'));
	}

	public function tambah()
	{
		$title            = 'Form Streaming | Petugas';
		$page             = 'streaming';
		$jadwal_streaming = JadwalStreaming::all();

		return view('Pengurus.Petugas.page.streaming.form-streaming',compact('title','page','jadwal_streaming'));
	}

	public function edit($id)
	{
		$title            = 'Form Streaming | Petugas';
		$page             = 'streaming';
		$jadwal_streaming = JadwalStreaming::all();
		$row              = Streaming::where('id_streaming',$id)->firstOrFail();

		return view('Pengurus.Petugas.page.streaming.form-streaming',compact('title','page','row','jadwal_streaming'));
	}

	public function statusTampil($id)
	{
		$streaming = Streaming::where('id_streaming',$id);
		if ($streaming->firstOrFail()->status_tampil == 1) {
			$streaming->update(['status_tampil' => 0]);
		}
		else {
			Streaming::where('id_streaming','!=',$id)->update(['status_tampil' => 0]);
			$streaming->update(['status_tampil' => 1]);
		}

		return redirect('/petugas/data-streaming')->with('message','Berhasil Ubah Status Streaming');
	}

	public function delete($id)
	{
		Streaming::where('id_streaming',$id)
						->delete();

		return redirect('/petugas/data-streaming')->with('message','Berhasil Hapus Streaming');
	}

	public function save(Request $request)
	{
		$jadwal_streaming = $request->jadwal_streaming;
		$judul_streaming  = $request->judul_streaming;
		$link_streaming   = $request->link_streaming;
		$ket_video		  = $request->ket_video;
		$id_streaming     = $request->id_streaming;

		$data_streaming = [
			'id_jadwal_streaming' => $jadwal_streaming,
			'judul_streaming'     => $judul_streaming,
			'link_streaming'      => $link_streaming,
			'status_tampil'		  => 1,
			'ket_video'			  => $ket_video,
			'id_users'            => Auth::id()
		];

		if ($id_streaming == '') {
			Streaming::create($data_streaming);

			$message = 'Berhasil Input Streaming';
		}
		else {
			unset($data_streaming['status_tampil']);
			
			Streaming::where('id_streaming',$id_streaming)
							->update($data_streaming);

			$message = 'Berhasil Update Streaming';
		}

		return redirect('/petugas/data-streaming')->with('message',$message);
	}
}
