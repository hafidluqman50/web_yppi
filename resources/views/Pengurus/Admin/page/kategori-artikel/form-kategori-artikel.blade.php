@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Artikel</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/admin/data-kategori-artikel') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
          </div>
      <form method="POST" action="{{url('/admin/data-kategori-artikel/save')}}" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" value="{{isset($row)?$row->nama_kategori:''}}" placeholder="Isi Nama Kategori" required="required">
              </div>
            <input type="hidden" name="id_kategori_artikel" value="{{isset($row)?$row->id_kategori_artikel:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
        </div>
      </div>
    </section>
@endsection