<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalStreamingModel as JadwalStreaming;

class StreamingModel extends Model
{
	protected $table      = 'streaming';
	protected $primaryKey = 'id_streaming';
	public $timestamps    = false;
	protected $guarded    = [];

	public static function getData()
	{
		$get = self::join('jadwal_streaming','streaming.id_jadwal_streaming','=','jadwal_streaming.id_jadwal_streaming')
					->join('users','streaming.id_users','=','users.id_users')
					->get();

		return $get;
	}

	public static function schedulerStreaming($time = '')
	{
		$get = self::join('jadwal_streaming','streaming.id_jadwal_streaming','=','jadwal_streaming.id_jadwal_streaming')
					->join('users','streaming.id_users','=','users.id_users')
					->where('tanggal_streaming',date('Y-m-d'))
					->where('ket_video','streaming')
					->orderBy('dari','asc');

		if ($time != '') {
			$data = $get->get();
		}
		else {
			$get->where('sampai',$time)->update(['ket_video'=>'penderesan']);
			$data = self::join('jadwal_streaming','streaming.id_jadwal_streaming','=','jadwal_streaming.id_jadwal_streaming')
					->join('users','streaming.id_users','=','users.id_users')
					->where('tanggal_streaming',date('Y-m-d'))
					->where('ket_video','streaming')
					->orderBy('dari','asc')->get();
		}


		return $data;
	}

	public static function getStreaming($time = '')
	{
		$get = self::join('jadwal_streaming','streaming.id_jadwal_streaming','=','jadwal_streaming.id_jadwal_streaming')
					->where('tanggal_streaming',date('Y-m-d'))
					->where('dari',$time)
					->where('status_tampil',1);

		if ($get->count() == 0) {
			$get = json_encode(['link_streaming' => '']);
			$get = json_decode($get);
		}
		else {
			// dd($get->firstOrFail());
			$get = $get->firstOrFail();
		}

		return $get;
	}

	public static function getPenderesan()
	{
		$tgl_video = JadwalStreaming::limit(1)->orderBy('tanggal_streaming','desc')->firstOrFail();
		$get = self::join('jadwal_streaming','streaming.id_jadwal_streaming','=','jadwal_streaming.id_jadwal_streaming')
					->where('tanggal_streaming',$tgl_video->tanggal_streaming)
					->where('ket_video','penderesan')
					->where('status_tampil',1)
					->get();

		return $get;
	}
}
