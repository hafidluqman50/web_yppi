@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Streaming</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Data Streaming</h5>
          </div>
          <div class="card-body">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
              {{ session('message') }} <button class="close" data-dismiss="alert">X</button>
            </div>
            @elseif(session()->has('log'))
            <div class="alert alert-danger alert-dismissible">
              {{ session('log') }} <button class="close" data-dismiss="alert">X</button>
            </div>
            @endif
            <a href="{{ url('/admin/data-streaming/tambah') }}">
              <button class="btn btn-primary">
                Tambah
              </button>
            </a>
            <br>
            <br>
            <table class="table table-bordered" width="100%">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Tanggal Streaming</th>
                  <th scope="col">Jadwal Streaming</th>
                  <th scope="col">Judul Streaming</th>
                  <th scope="col">Link Streaming</th>
                  <th scope="col">Input By</th>
                  <th scope="col">Status Streaming</th>
                  <th scope="col">Ket Video</th>
                  <th scope="col">#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ human_date($value->tanggal_streaming) }}</td>
                  <td>{{ $value->dari.' WITA - '.$value->sampai.' WITA ' }}</td>
                  <td>{{ $value->judul_streaming }}</td>
                  <td><a href="{{ $value->link_streaming }}" target="_blank">{{ $value->link_streaming }}</a></td>
                  <td>{{ $value->nama }}</td>
                  <td>
                    @if($value->status_tampil == 1)
                    <span class="badge badge-success">Tampil</span>
                    @else
                    <span class="badge badge-danger">Sembunyi</span>
                    @endif
                  </td>
                  <td>
                    @if($value->ket_video == 'streaming')
                    <span class="badge badge-danger">Streaming</span>
                    @else
                    <span class="badge badge-warning">Penderesan</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('/admin/data-streaming/edit',$value->id_streaming)}}">
                      <button class="btn btn-warning">Edit</button>
                    </a>
                    <a href="{{url('/admin/data-streaming/delete',$value->id_streaming)}}">
                      <button class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">Hapus</button>
                    </a>
                    <a href="{{ url('/admin/data-streaming/status-tampil',$value->id_streaming) }}">
                      @if($value->status_tampil == 1)
                      <button class="btn btn-danger">Sembunyikan</button>
                      @elseif($value->status_tampil == 0)
                      <button class="btn btn-success">Tampilkan</button>
                      @endif
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </section>
@endsection