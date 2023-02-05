@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Menu Pendidikan</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
      	<div class="card">
      		<div class="card-header">
            <a href="{{ url('/admin/data-menu-pendidikan') }}">
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
                <label for="" class="form-label">Halaman</label>
                <select name="halaman" id="" class="form-control" required="required">
                  <option selected disabled>=== Pilih Halaman ===</option>
                  <option value="smp-budi-luhur" @if(isset($row)){{$row->halaman=='smp-budi-luhur'?'selected':''}}@endif>Jenjang > SMP Budi Luhur</option>
                  <option value="sma-budi-luhur" @if(isset($row)){{$row->halaman=='sma-budi-luhur'?'selected':''}}@endif>Jenjang > SMA Budi Luhur</option>
                  <option value="prestasi-sekolah" @if(isset($row)){{$row->halaman=='prestasi-sekolah'?'selected':''}}@endif>Prestasi Sekolah</option>
                </select>
              </div>
	      		</div>
      			<input type="hidden" name="menu" value="pendidikan">
            <input type="hidden" name="id_profil" value="{{isset($row)?$row->id_profil:''}}">
	      		<div class="card-footer">
	      			<button type="submit" class="btn btn-primary">Simpan</button>
	      		</div>
		    	</form>
      	</div>
      </div>
    </section>
@endsection