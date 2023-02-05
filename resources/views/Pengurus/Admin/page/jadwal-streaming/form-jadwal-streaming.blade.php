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
            <a href="{{ url('/admin/data-jadwal-streaming') }}">
              <button class="btn btn-default">
                <span class="fa fa-arrow-left"></span> Kembali
              </button>
            </a>
          </div>
      <form method="POST" action="{{url('/admin/data-jadwal-streaming/save')}}">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Tanggal Streaming</label>
                <input type="date" class="form-control" name="tanggal_jadwal" value="{{ isset($row) ? $row->tanggal_streaming : '' }}" required="required">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Jadwal Streaming</label>
                <input type="text" class="form-control" name="dari" placeholder="00.00" value="{{ isset($row) ? $row->dari : '' }}" required="required">
                -
                <input type="text" class="form-control" name="sampai" placeholder="00.00" value="{{ isset($row) ? $row->sampai : '' }}" required="required">
              </div>
            <input type="hidden" name="id_jadwal_streaming" value="{{isset($row)?$row->id_jadwal_streaming:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
        </div>
      </div>
    </section>
@endsection