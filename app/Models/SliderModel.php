<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
	protected $table      = 'slider';
	protected $primaryKey = 'id_slider';
	public $timestamps    = false;
	protected $guarded    = [];

    public static function getData()
    {
    	$get = self::join('artikel','slider.id_artikel','=','artikel.id_artikel')
    				->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->orderBy('created_at','desc')
    				->get();

    	return $get;
    }

    public static function count()
    {
    	$get = self::count();

    	return $get;
    }
}
