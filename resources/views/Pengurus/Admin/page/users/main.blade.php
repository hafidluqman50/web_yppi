@extends('Pengurus.layout.layout-app')

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Video</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
      	<div class="card">
      		<div class="card-header">
      			<h5 class="title">Data Video</h5>
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
            <a href="{{url('/admin/users/tambah')}}">
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
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Status</th>
                  <th scope="col">Last Login</th>
		      				<th scope="col">#</th>
		      			</tr>
		      		</thead>
		      		<tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->username }}</td>
                  <td>
                    @if($value->status_akun == 0)
                    <span class="badge badge-danger">
                      Non aktif
                    </span>
                    @else
                    <span class="badge badge-success">
                      Aktif
                    </span>
                    @endif
                  </td>
                  <td>{{ $value->last_login }}</td>
                  <td>
                    <a href="{{ url('/admin/users/status-akun',$value->id_users) }}">
                      <button class="btn {{$value->status_akun==1?'btn-danger':'btn-success'}}">
                        {{ $value->status_akun==1?'Nonaktifkan':'Aktifkan' }}
                      </button>
                    </a>
                    <a href="{{ url('/admin/users/edit',$value->id_users) }}">
                      <button class="btn btn-warning">
                        Edit
                      </button>
                    </a>
                    <a href="{{ url('/admin/users/delete',$value->id_users) }}">
                      <button class="btn btn-danger" onclick="return confirm('Yakin Hapus ?');">
                        Hapus
                      </button>
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