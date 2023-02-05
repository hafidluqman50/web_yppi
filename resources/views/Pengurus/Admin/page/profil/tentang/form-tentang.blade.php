@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Menu Tentang</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
      	<div class="card">
      		<div class="card-header">
            <a href="{{ url('/admin/data-menu-tentang-kami') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
      		</div>
			     <form method="POST" action="{{url('/admin/profil/save')}}">
	      		<div class="card-body">
      				@csrf
      				<div class="form-group">
      					<label for="" class="form-label">Judul</label>
      					<input type="text" class="form-control" name="judul_profil" value="{{isset($row)?$row->judul_profil:''}}" placeholder="Isi Judul" required="required">
      				</div>
              <div class="form-group">
                <label for="" class="form-label">Konten</label>
                <textarea name="konten" class="form-control" id="" cols="30" rows="10">{{isset($row)?$row->konten:''}}</textarea>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Pilih Halaman</label>
                <select name="halaman" class="form-control" id="" required="required">
                  <option selected disabled>=== Pilih Halaman ===</option>
                  <option value="sejarah" @if(isset($row)){{$row->halaman=='sejarah'?'selected':''}}@endif>Sejarah</option>
                  <option value="visi-dan-misi" @if(isset($row)){{$row->halaman=='visi-dan-misi'?'selected':''}}@endif>Visi Dan Misi</option>
                  <option value="struktur Organisasi" @if(isset($row)){{$row->halaman=='struktur Organisasi'?'selected':''}}@endif>Struktur Organisasi</option>
                  <option value="pendidikan-dan-tenaga-pendidikan" @if(isset($row)){{$row->halaman=='pendidikan-dan-tenaga-pendidikan'?'selected':''}}@endif>Pendidikan Dan Tenaga Pendidikan</option>
                  <option value="galeri" @if(isset($row)){{$row->halaman=='galeri'?'selected':''}}@endif>Galeri</option>
                </select>
              </div>
	      		</div>
      			<input type="hidden" name="menu" value="tentang-kami">
            <input type="hidden" name="id_profil" value="{{isset($row)?$row->id_profil:''}}">
	      		<div class="card-footer">
	      			<button type="submit" class="btn btn-primary">Simpan</button>
	      		</div>
		    	</form>
      	</div>
      </div>
    </section>
@endsection