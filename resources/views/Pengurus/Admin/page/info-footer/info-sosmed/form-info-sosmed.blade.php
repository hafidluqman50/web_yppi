@extends('Pengurus.layout.layout-app')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Info Alamat</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h5 class="title">Form Info Alamat</h5>
          </div>
      		<form method="POST" action="{{url('/admin/info-footer/save')}}" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="form-group">
              	<label>Sosmed</label>
              	<select name="judul_info" class="form-control" required="required">
              		<option selected="selected" disabled="disabled">=== Pilih Sosmed ===</option>
              		<option value="facebook" @if (isset($row)){!!$row->judul_info=='facebook'?'selected="selected"':''!!}@endif>Facebook</option>
              		<option value="twitter" @if (isset($row)){!!$row->judul_info=='twitter'?'selected="selected"':''!!}@endif>Twitter</option>
              		<option value="google-plus" @if (isset($row)){!!$row->judul_info=='google-plus'?'selected="selected"':''!!}@endif>Google Plus</option>
              		<option value="linkedin" @if (isset($row)){!!$row->judul_info=='linkedin'?'selected="selected"':''!!}@endif>Linked In</option>
              		<option value="instagram" @if (isset($row)){!!$row->judul_info=='instagram'?'selected="selected"':''!!}@endif>Instagram</option>
              	</select>
              </div>
              <div class="form-group">
              	<label>Alamat Link</label>
              	<input type="text" name="link_info" class="form-control" value="{{isset($row)?$row->link_info:''}}" placeholder="Isi Alamat Link" required="required">
              </div>
            </div>
            <input type="hidden" name="keterangan" value="sosmed">
            <input type="hidden" name="id" value="{{isset($row)?$row->id_info_footer:''}}">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      		</form>
        </div>
      </div>
    </section>
@endsection