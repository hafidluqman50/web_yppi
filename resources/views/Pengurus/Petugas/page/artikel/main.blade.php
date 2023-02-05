@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Artikel</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
      	<div class="card">
      		<div class="card-header">
      			<h5 class="title">Data Artikel</h5>
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
            <a href="{{ url('/petugas/data-artikel/tambah') }}">
              <button class="btn btn-primary">
                Tambah
              </button>
            </a>
            <br>
            <br>
		      	<table class="table table-bordered">
		      		<thead>
		      			<tr>
		      				<th scope="col">No.</th>
		      				<th scope="col">Tanggal Artikel</th>
		      				<th scope="col">Judul Artikel</th>
		      				<th scope="col">Kategori Artikel</th>
                  <th scope="col">Input By</th>
                  <th scope="col">#</th>
		      			</tr>
		      		</thead>
		      		<tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ human_date($value->tanggal_artikel) }}</td>
                  <td>{{ $value->judul_artikel }}</td>
                  <td>{{ $value->nama_kategori }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>
                    <a href="{{url('/petugas/data-artikel/edit',$value->id_artikel)}}">
                      <button class="btn btn-warning">Edit</button>
                    </a>
                    <a href="{{url('/petugas/data-artikel/delete',$value->id_artikel)}}">
                      <button class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">Hapus</button>
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