@php
$level = Auth::user()->level==1?'admin':(Auth::user()->level==0?'petugas':'');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ $title }}</title>

  <link rel="shortcut icon" href="{{asset('frontend-assets/logo.jpg')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend-assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/yppi.png') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend-assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend-assets/plugins/datatables/dataTables.bootstrap4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="true">
          <i class="nav-icon fa fa-user"></i>&nbsp;&nbsp;&nbsp;{{ Auth::user()->nama }}
          <i class="nav-icon fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('/'.$level.'/ubah-profile') }}" class="dropdown-item">
            <span class="fa fa-cogs"></span>
            Ubah Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/logout') }}" class="dropdown-item">
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('assets/img/yppi.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Web YPPI</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('/'.$level.'/dashboard')}}" class="nav-link @if(isset($page)){{$page=='dashboard'?'active':''}}@endif">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->level==1)
          <li class="nav-item has-treeview {{isset($active)?'menu-open':''}}">
            <a href="#" class="nav-link {{isset($active)?$active:''}}">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Profil
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/data-menu-tentang-kami') }}" class="nav-link @if(isset($page)){{$page=='tentang-kami'?'active':''}}@endif">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Tentang Kami</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/data-menu-pendidikan') }}" class="nav-link @if(isset($page)){{$page=='pendidikan'?'active':''}}@endif">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('/'.$level.'/data-slider') }}" class="nav-link @if(isset($page)){{$page=='slider'?'active':''}}@endif">
              <i class="nav-icon fa fa-sliders"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/'.$level.'/data-jadwal-streaming') }}" class="nav-link @if(isset($page)){{$page=='jadwal-streaming'?'active':''}}@endif">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Jadwal Streaming
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/'.$level.'/data-streaming') }}" class="nav-link @if(isset($page)){{$page=='streaming'?'active':''}}@endif">
              <i class="nav-icon fa fa-television"></i>
              <p>
                Streaming
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/'.$level.'/data-artikel') }}" class="nav-link @if(isset($page)){{$page=='artikel'?'active':''}}@endif">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>
                Artikel
              </p>
            </a>
          </li>
          @if(Auth::user()->level==1)
          <li class="nav-item">
            <a href="{{ url('/admin/data-kategori-artikel') }}" class="nav-link @if(isset($page)){{$page=='kategori-artikel'?'active':''}}@endif">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Kategori Artikel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/users') }}" class="nav-link @if(isset($page)){{$page=='users'?'active':''}}@endif">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">