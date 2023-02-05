@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Slider</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/petugas/data-slider') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
          </div>
      <form method="POST" action="{{url('/petugas/data-slider/save')}}" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Artikel</label>
                <select name="artikel" class="form-control select2">
                  <option value="" selected="selected" disabled="disabled">=== Pilih Artikel ===</option>
                  @foreach($artikel as $data)
                  <option value="{{ $data->id_artikel }}" @if(isset($row)){!!$row->id_artikel == $data->id_artikel ? 'selected="selected"' : ''!!}@endif>{{ $data->judul_artikel.' - '.$data->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>
            <input type="hidden" name="id_slider" value="{{isset($row)?$row->id_slider:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
        </div>
      </div>
    </section>
@endsection