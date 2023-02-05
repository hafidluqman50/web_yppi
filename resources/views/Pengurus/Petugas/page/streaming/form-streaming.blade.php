@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Jadwal Streaming</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/petugas/data-streaming') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
          </div>
      <form method="POST" action="{{url('/petugas/data-streaming/save')}}">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Jadwal Streaming</label>
                <select name="jadwal_streaming" class="form-control select2" required="required">
                  <option value="" selected="selected" disabled="disabled">=== Pilih Jadwal Streaming ===</option>
                  @foreach($jadwal_streaming as $data)
                  <option value="{{ $data->id_jadwal_streaming }}" @if(isset($row)) {!!$row->id_jadwal_streaming == $data->id_jadwal_streaming ? 'selected="selected"' : '' !!} @endif>{{ human_date($data->tanggal_streaming).' | '.$data->jadwal_streaming }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Judul Streaming</label>
                <input type="text" name="judul_streaming" class="form-control" value="{{ isset($row) ? $row->judul_streaming : '' }}" placeholder="Isi Judul Streaming" required="required">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Link Streaming</label>
                <input type="text" name="link_streaming" class="form-control" value="{{ isset($row) ? $row->link_streaming : '' }}" placeholder="Isi Link Streaming" required="required">
              </div>
            <input type="hidden" name="id_streaming" value="{{isset($row)?$row->id_streaming:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
        </div>
      </div>
    </section>
@endsection