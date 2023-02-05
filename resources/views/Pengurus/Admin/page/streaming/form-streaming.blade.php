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
            <a href="{{ url('/admin/data-streaming') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
          </div>
      <form method="POST" action="{{url('/admin/data-streaming/save')}}">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Jadwal Streaming</label>
                <select name="jadwal_streaming" class="form-control select2" required="required">
                  <option value="" selected="selected" disabled="disabled">=== Pilih Jadwal Streaming ===</option>
                  @foreach($jadwal_streaming as $data)
                  <option value="{{ $data->id_jadwal_streaming }}" @if(isset($row)) {!!$row->id_jadwal_streaming == $data->id_jadwal_streaming ? 'selected="selected"' : '' !!} @endif>{{ human_date($data->tanggal_streaming).' | '.$data->dari.' WITA - '.$data->sampai.' WITA ' }}</option>
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
              <div class="form-group">
                <label for="" class="form-label">Ket Video</label>
                <select name="ket_video" class="form-control" required="required">
                  <option value="" selected="selected" disabled="disabled">=== Pilih Ket Video ===</option>
                  <option value="streaming" @if(isset($row)){!!$row->ket_video == 'streaming' ? 'selected="selected"' : ''!!}@endif>Streaming</option>
                  <option value="penderesan" @if(isset($row)){!!$row->ket_video == 'penderesan' ? 'selected="selected"' : ''!!}@endif>Penderesan</option>
                </select>
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