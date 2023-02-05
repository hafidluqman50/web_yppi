<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ArtikelModel as Artikel;

class KategoriArtikelModel extends Model
{
	protected $table      = 'kategori_artikel';
	protected $primaryKey = 'id_kategori_artikel';
	public $timestamps    = false;
	protected $guarded    = [];

	public static function count($id_kategori_artikel)
	{
		$count = Artikel::where('id_kategori_artikel',$id_kategori_artikel)->count();

		return $count;
	}

	public static function showPopularTag()
	{
		$popular = self::where('counter','>',10)->get();

		return $popular;
	}

	public static function counter($kategori)
	{
		$row = self::where('slug_kategori',$kategori)->firstOrFail();
		self::where('slug_kategori',$kategori)
			->update(['counter'=>$row->counter+1]);
	}
}
