<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalStreamingModel extends Model
{
	protected $table      = 'jadwal_streaming';
	protected $primaryKey = 'id_jadwal_streaming';
	public $timestamps    = false;
	protected $guarded    = [];

	public static function getData()
	{
		$get = self::join('users','jadwal_streaming.id_users','=','users.id_users')
					->get();

		return $get;
	}
}
