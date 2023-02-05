<?php
// use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/cok',function(){
	echo strlen('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
});
Route::get('/',['uses' => 'Home\HomeController@index']);
Route::get('/tentang-kami/{url}',['uses' => 'Home\HomeController@tentangKami']);
Route::get('/pendidikan/jenjang/{url}',['uses' => 'Home\HomeController@pendidikan']);
Route::get('/pendidikan/{url}',['uses' => 'Home\HomeController@pendidikan']);
Route::get('/artikel',['uses' => 'Home\HomeController@artikel']);
Route::get('/artikel/cari',['uses' => 'Home\HomeController@cariArtikel']);
Route::get('/artikel/kategori/{slug}',['uses' => 'Home\HomeController@artikelByKategori']);
Route::get('/artikel/{slug}',['uses' => 'Home\HomeController@artikelDetail']);
Route::get('/streaming',['uses' => 'Home\HomeController@streaming']);
Route::get('/penderesan',['uses' => 'Home\HomeController@penderesan']);

Route::group(['middleware'=>'isLogin'],function(){
	Route::get('/login-form',['as'=>'login-form','uses'=>'AuthController@index']);
	Route::post('/login/auth',['as'=>'login-post','uses'=>'AuthController@login']);
});
Route::get('/logout',['as'=>'logout','uses'=>'AuthController@logout']);

Route::group(['prefix'=>'admin','middleware'=>'isAdmin'],function(){
	Route::get('/dashboard',['as'=>'admin-dashboard','uses'=>'Admin\DashboardController@dashboard']);

	// PROFIL //
	Route::get('/data-menu-tentang-kami',['as'=>'admin-data-tentang','uses'=>'Admin\ProfilController@tentangKami']);
	Route::get('/data-menu-tentang-kami/tambah',['as'=>'admin-tentang-tambah','uses'=>'Admin\ProfilController@tambahTentangKami']);
	Route::get('/data-menu-tentang-kami/edit/{id}',['as'=>'admin-tentang-edit','uses'=>'Admin\ProfilController@editTentangKami']);
	Route::get('/data-menu-pendidikan',['as'=>'admin-data-pendidikan','uses'=>'Admin\ProfilController@pendidikan']);
	Route::get('/data-menu-pendidikan/tambah',['as'=>'admin-pendidikan-tambah','uses'=>'Admin\ProfilController@tambahPendidikan']);
	Route::get('/data-menu-pendidikan/edit/{id}',['as'=>'admin-pendidikan-edt','uses'=>'Admin\ProfilController@editPendidikan']);
	Route::get('/profil/{menu}/delete/{id}',['as'=>'admin-profil-delete','uses'=>'Admin\ProfilController@delete']);
	Route::post('/profil/save',['as'=>'admin-profil-save','uses'=>'Admin\ProfilController@save']);
	// END PROFIL //

	// ARTIKEL //
	Route::get('/data-artikel',['as'=>'admin-data-artikel','uses'=>'Admin\ArtikelController@index']);
	Route::get('/data-artikel/tambah',['as'=>'admin-artikel-tambah','uses'=>'Admin\ArtikelController@tambah']);
	Route::get('/data-artikel/edit/{id}',['as'=>'admin-artikel-edit','uses'=>'Admin\ArtikelController@edit']);
	Route::get('/data-artikel/delete/{id}',['as'=>'admin-artikel-delete','uses'=>'Admin\ArtikelController@delete']);
	Route::post('/artikel/save',['as'=>'admin-artikel-save','uses'=>'Admin\ArtikelController@save']);
	// END ARTIKEL

	// KATEGORI ARTIKEL //
	Route::get('/data-kategori-artikel',['as'=>'admin-data-kategori-artikel','uses'=>'Admin\KategoriArtikelController@index']);
	Route::get('/data-kategori-artikel/tambah',['as'=>'admin-kategori-artikel-tambah','uses'=>'Admin\KategoriArtikelController@tambah']);
	Route::get('/data-kategori-artikel/edit/{id}',['as'=>'admin-kategori-artikel-edit','uses'=>'Admin\KategoriArtikelController@edit']);
	Route::get('/data-kategori-artikel/delete/{id}',['as'=>'admin-kategori-artikel-delete','uses'=>'Admin\KategoriArtikelController@delete']);
	Route::post('/data-kategori-artikel/save',['as'=>'admin-kategori-artikel-save','uses'=>'Admin\KategoriArtikelController@save']);
	// END KATEGORI ARTIKEL //

	// SLIDER //
	Route::get('/data-slider',['as'=>'admin-data-slider','uses'=>'Admin\SliderController@index']);
	Route::get('/data-slider/tambah',['as'=>'admin-slider-tambah','uses'=>'Admin\SliderController@tambah']);
	Route::get('/data-slider/edit/{id}',['as'=>'admin-slider-edit','uses'=>'Admin\SliderController@edit']);
	Route::get('/data-slider/delete/{id}',['as'=>'admin-slider-delete','uses'=>'Admin\SliderController@delete']);
	Route::post('/data-slider/save',['as'=>'admin-slider-save','uses'=>'Admin\SliderController@save']);
	// END SLIDER //

	// JADWAL STREAMING //
	Route::get('/data-jadwal-streaming',['as' => 'admin-data-jadwal-streaming','uses' => 'Admin\JadwalStreamingController@index']);
	Route::get('/data-jadwal-streaming/tambah',['as' => 'admin-data-jadwal-streaming','uses' => 'Admin\JadwalStreamingController@tambah']);
	Route::get('/data-jadwal-streaming/edit/{id}',['as' => 'admin-data-jadwal-streaming','uses' => 'Admin\JadwalStreamingController@edit']);
	Route::get('/data-jadwal-streaming/delete/{id}',['as' => 'admin-data-jadwal-streaming','uses' => 'Admin\JadwalStreamingController@delete']);
	Route::post('/data-jadwal-streaming/save',['as' => 'admin-data-jadwal-streaming','uses' => 'Admin\JadwalStreamingController@save']);
	// END JADWAL STREAMING //

	// STREAMING //
	Route::get('/data-streaming',['as' => 'admin-data-streaming','uses' => 'Admin\StreamingController@index']);
	Route::get('/data-streaming/tambah',['as' => 'admin-data-streaming','uses' => 'Admin\StreamingController@tambah']);
	Route::get('/data-streaming/edit/{id}',['as' => 'admin-data-streaming','uses' => 'Admin\StreamingController@edit']);
	Route::get('/data-streaming/delete/{id}',['as' => 'admin-data-streaming','uses' => 'Admin\StreamingController@delete']);
	Route::get('/data-streaming/status-tampil/{id}',['as' => 'admin-data-streaming','uses' => 'Admin\StreamingController@statusTampil']);
	Route::post('/data-streaming/save',['as' => 'admin-data-streaming','uses' => 'Admin\StreamingController@save']);
	// END STREAMING //

	// INFO FOOTER //
	Route::get('/info-footer/alamat',['as'=>'info-footer-alamat','uses'=>'Admin\InfoFooterController@infoAlamat']);
	Route::get('/info-footer/alamat/tambah',['as'=>'info-footer-alamat-tambah','uses'=>'Admin\InfoFooterController@tambahInfoAlamat']);
	Route::get('/info-footer/alamat/edit/{id}',['as'=>'info-alamat-edit','uses'=>'Admin\InfoFooterController@editInfoAlamat']);
	Route::get('/info-footer/tautan',['as'=>'info-footer-alamat','uses'=>'Admin\InfoFooterController@infoTautan']);
	Route::get('/info-footer/tautan/tambah',['as'=>'info-footer-alamat-tambah','uses'=>'Admin\InfoFooterController@tambahInfoTautan']);
	Route::get('/info-footer/tautan/edit/{id}',['as'=>'info-alamat-edit','uses'=>'Admin\InfoFooterController@editInfoTautan']);
	Route::get('/info-footer/sosmed',['as'=>'info-footer-alamat','uses'=>'Admin\InfoFooterController@infoSosmed']);
	Route::get('/info-footer/sosmed/tambah',['as'=>'info-footer-alamat-tambah','uses'=>'Admin\InfoFooterController@tambahInfoSosmed']);
	Route::get('/info-footer/sosmed/edit/{id}',['as'=>'info-alamat-edit','uses'=>'Admin\InfoFooterController@editInfoSosmed']);
	Route::get('/info-footer/{ktg}/delete/{id}',['as'=>'info-footer-delete','uses'=>'Admin\InfoFooterController@delete']);
	Route::post('/info-footer/save',['as'=>'info-footer-save','uses'=>'Admin\InfoFooterController@save']);
	// END INFO FOOTER //

	// DATA USER //
	Route::get('/users',['as'=>'admin-data-users','uses'=>'Admin\UsersController@users']);
	Route::get('/users/tambah',['as'=>'admin-data-users','uses'=>'Admin\UsersController@tambahUsers']);
	Route::get('/users/edit/{id}',['as'=>'admin-data-users','uses'=>'Admin\UsersController@editUsers']);
	Route::get('/users/status-akun/{id}',['as'=>'admin-data-users','uses'=>'Admin\UsersController@statusAkun']);
	Route::get('/users/delete/{id}',['as'=>'admin-data-users','uses'=>'Admin\UsersController@delete']);
	Route::post('/users/save',['as'=>'admin-data-users','uses'=>'Admin\UsersController@save']);
	// END DATA USER //

	// UBAH PROFIl //
	Route::get('/ubah-profile',['as'=>'admin-ubah-profile','uses'=>'Admin\DashboardController@settings']);
	Route::post('/ubah/save',['as'=>'admin-save-profile','uses'=>'Admin\DashboardController@updateProfile']);
	// END UBAH PROFIL //
});

Route::group(['prefix'=>'petugas','middleware'=>'isPetugas'],function(){
	Route::get('/dashboard',['as'=>'petugas-dashboard','uses'=>'Petugas\DashboardController@dashboard']);

	// ARTIKEL //
	Route::get('/data-artikel',['as'=>'petugas-data-artikel','uses'=>'Petugas\ArtikelController@index']);
	Route::get('/data-artikel/tambah',['as'=>'petugas-artikel-tambah','uses'=>'Petugas\ArtikelController@tambah']);
	Route::get('/data-artikel/edit/{id}',['as'=>'petugas-artikel-edit','uses'=>'Petugas\ArtikelController@edit']);
	Route::get('/data-artikel/delete/{id}',['as'=>'petugas-artikel-delete','uses'=>'Petugas\ArtikelController@delete']);
	Route::post('/artikel/save',['as'=>'petugas-artikel-save','uses'=>'Petugas\ArtikelController@save']);
	// END ARTIKEL

	// SLIDER //
	Route::get('/data-slider',['as'=>'petugas-data-slider','uses'=>'Petugas\SliderController@index']);
	Route::get('/data-slider/tambah',['as'=>'petugas-slider-tambah','uses'=>'Petugas\SliderController@tambah']);
	Route::get('/data-slider/edit/{id}',['as'=>'petugas-slider-edit','uses'=>'Petugas\SliderController@edit']);
	Route::get('/data-slider/delete/{id}',['as'=>'petugas-slider-delete','uses'=>'Petugas\SliderController@delete']);
	Route::post('/data-slider/save',['as'=>'petugas-slider-save','uses'=>'Petugas\SliderController@save']);
	// END SLIDER //

	// JADWAL STREAMING //
	Route::get('/data-jadwal-streaming',['as' => 'admin-data-jadwal-streaming','uses' => 'Petugas\JadwalStreamingController@index']);
	Route::get('/data-jadwal-streaming/tambah',['as' => 'admin-data-jadwal-streaming','uses' => 'Petugas\JadwalStreamingController@tambah']);
	Route::get('/data-jadwal-streaming/edit/{id}',['as' => 'admin-data-jadwal-streaming','uses' => 'Petugas\JadwalStreamingController@edit']);
	Route::get('/data-jadwal-streaming/delete/{id}',['as' => 'admin-data-jadwal-streaming','uses' => 'Petugas\JadwalStreamingController@delete']);
	Route::post('/data-jadwal-streaming/save',['as' => 'admin-data-jadwal-streaming','uses' => 'Petugas\JadwalStreamingController@save']);
	// END JADWAL STREAMING //

	// STREAMING //
	Route::get('/data-streaming',['as' => 'admin-data-streaming','uses' => 'Petugas\StreamingController@index']);
	Route::get('/data-streaming/tambah',['as' => 'admin-data-streaming','uses' => 'Petugas\StreamingController@tambah']);
	Route::get('/data-streaming/edit/{id}',['as' => 'admin-data-streaming','uses' => 'Petugas\StreamingController@edit']);
	Route::get('/data-streaming/delete/{id}',['as' => 'admin-data-streaming','uses' => 'Petugas\StreamingController@delete']);
	Route::get('/data-streaming/status-tampil/{id}',['as' => 'admin-data-streaming','uses' => 'Petugas\StreamingController@statusTampil']);
	Route::post('/data-streaming/save',['as' => 'admin-data-streaming','uses' => 'Petugas\StreamingController@save']);
	// END STREAMING //

	// UBAH PROFIl //
	Route::get('/ubah-profile',['as'=>'petugas-ubah-profile','uses'=>'Petugas\DashboardController@settings']);
	Route::post('/ubah/save',['as'=>'petugas-save-profile','uses'=>'Petugas\DashboardController@updateProfile']);
	// END UBAH PROFIL //
});


