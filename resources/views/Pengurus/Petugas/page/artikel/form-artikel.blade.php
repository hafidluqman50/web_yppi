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
            <a href="{{ url('/petugas/data-artikel') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
          </div>
      <form method="POST" action="{{url('/petugas/artikel/save')}}" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                  <label for="" class="form-label">Tanggal Artikel</label>
                  <input type="date" class="form-control" name="tanggal_artikel" value="{{isset($row) ? $row->tanggal_artikel : ''}}" required="required">
              </div>   
              <div class="form-group">
                <label for="" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" name="judul_artikel" value="{{isset($row)?$row->judul_artikel:''}}" placeholder="Isi Judul Artikel" required="required">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Isi Artikel</label>
                <textarea name="isi_artikel" class="form-control">{{isset($row)?$row->isi_artikel:''}}</textarea>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Kategori Artikel</label>
                <select name="id_kategori_artikel" class="form-control select2">
                  <option value="" selected="selected" disabled="disabled">=== Pilih Kategori ===</option>
                  @foreach($kategori_artikel as $data)
                  <option value="{{ $data->id_kategori_artikel }}" @if(isset($row)){!!$row->id_kategori_artikel == $data->id_kategori_artikel ? 'selected="selected"' : ''!!}@endif>{{ $data->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Foto Artikel</label>
                <input type="file" name="foto_artikel" class="form-control">
              </div>
            </div>
            <input type="hidden" name="kategori" value="berita">
            <input type="hidden" name="id_artikel" value="{{isset($row)?$row->id_artikel:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
        </div>
      </div>
    </section>
@endsection