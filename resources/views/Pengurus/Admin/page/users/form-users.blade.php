@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Data User</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Form Data User</h5>
          </div>
          <form method="POST" action="{{url('/admin/users/save')}}">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="{{isset($row)?$row->username:''}}" placeholder="Isi Username" required="required" {{isset($row)?'disabled="disabled"':''}}>
                 {!!isset($row)?'<input type="checkbox" name="user"> Ubah Username':''!!}
              </div>
              <div class="form-group">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required="required">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required="required" value="{{isset($row)?$row->nama:''}}" placeholder="Isi Nama">
              </div>
            </div>
            <input type="hidden" name="id_users" value="{{isset($row)?$row->id_users:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection

@section('js')
<script>
  $(function(){
    $('input[type="checkbox"][name="user"]').click(function(){
      if ($(this).is(':checked')) {
      $('input[name="username"]').removeAttr('disabled'); 
      }
      else {
      $('input[name="username"]').attr('disabled','disabled');  
      }
    });
  });
</script>
@endsection