<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $guarded = [];

    public static function getData()
    {
    	$get = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->join('users','artikel.id_users','=','users.id_users')
    				->orderBy('tanggal_artikel','desc')
    				->get();

    	return $get;
    }

    public static function getFirstNewest()
    {
    	$get = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->join('users','artikel.id_users','=','users.id_users')
    				->limit(1)
    				->orderBy('tanggal_artikel','desc')
    				->firstOrFail();

    	return $get;
    }

    public static function getNewestPost()
    {
    	$get = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->offset(1)
    				->limit(4)
    				->orderBy('tanggal_artikel','desc')
    				->get();

    	return $get;
    }

    public static function getDataPaginate($kategori = '')
    {
    	if ($kategori == '') {
	    	$paginate = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
	    				->orderBy('created_at','desc')
	    				->paginate(6);
    	}
    	else {
    		$paginate = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->where('slug_kategori',$kategori)
    				->orderBy('created_at','desc')
    				->paginate(6);
    	}

    	return $paginate;
    }

    public static function getBySlug($slug)
    {
    	$get = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->join('users','artikel.id_users','=','users.id_users')
    				->where('judul_slug_artikel',$slug)
    				->firstOrFail();

    	return $get;
    }

    public static function showRelated($id_artikel,$id_kategori_artikel)
    {
    	$get = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				// ->join('users','artikel.id_users','=','users.id_users')
    				->whereIn('artikel.id_artikel',[$id_artikel+1,$id_artikel+1+1])
    				->where('artikel.id_kategori_artikel',$id_kategori_artikel)
    				->limit(2)
    				->get();

    	return $get;
    }

    public static function getPopularArticle()
    {
    	$popular = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
	    				->join('users','artikel.id_users','=','users.id_users')
	    				->orderBy('artikel.counter','desc')
	    				->limit(4)
	    				->get();

    	return $popular;
    }

    public static function cariArtikel($s)
    {
    	$get = self::join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id_kategori_artikel')
    				->where('judul_artikel','like','%'.$s.'%')
    				->orderBy('created_at','desc')
    				->paginate(6);

    	return $get;
    }
}
