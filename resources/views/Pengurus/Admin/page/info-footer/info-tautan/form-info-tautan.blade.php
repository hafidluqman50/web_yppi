@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Info Tautan</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Form Info Tautan</h5>
          </div>
      		<form method="POST" action="{{url('/admin/info-footer/save')}}" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
              	<label>Judul Link</label>
              	<input type="text" name="judul_info" class="form-control" value="{{isset($row)?$row->judul_link:''}}" placeholder="Isi Judul Link" required="required">
              </div>
              <div class="form-group">
              	<label>Alamat link</label>
              	<input type="text" name="link_info" class="form-control" value="{{isset($row)?$row->link_info:''}}" placeholder="Isi Alamat Link" required="required">
              </div>
            </div>
            <input type="hidden" name="keterangan" value="tautan">
            <input type="hidden" name="id" value="{{isset($row)?$row->id_info_footer:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      		</form>
        </div>
      </div>
    </section>
@endsection