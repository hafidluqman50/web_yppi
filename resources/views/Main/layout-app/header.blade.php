<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>{{isset($title) ? $title : ''}} | Yayasan Pembinaan & Pemberdayaan Insani HUD Samarinda</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/yppi.png') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="/assets/custom.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="nikkiNav">

                        <!-- Nav brand -->
                        {{-- <a href="index.html" class="nav-brand"><img src="/assets/img/core-img/logo.png" alt=""></a> --}}
                        <a href="{{ url('/') }}" class="nav-brand"><img src="{{ asset('assets/img/yppi.png') }}" alt=""></a>
                        <p class="navbar-brand hide" style="margin-left: -250px;margin-top: 13px;color:#35352e;"> YPPI-HUD SAMARINDA </p>
                        <!-- <a href="{{ url('/') }}" class="nav-brand"><img src="{{ asset('assets/img/smp.png') }}" alt=""></a>
                        <a href="{{ url('/') }}" class="nav-brand"><img src="{{ asset('assets/img/sma.png') }}" alt=""></a> -->

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ url('/') }}">Beranda</a></li>
                                    <li><a href="#">Tentang Kami</a>
                                        <ul class="dropdown" style="width:300px;">
                                            <li><a href="{{ url('/tentang-kami/sejarah') }}">Sejarah</a></li>
                                            <li><a href="{{ url('/tentang-kami/visi-dan-misi') }}">Visi Dan Misi</a></li>
                                            <li><a href="{{ url('/tentang-kami/struktur-organisasi') }}">Struktur Organisasi</a></li>
                                            <li><a href="{{ url('/tentang-kami/pendidikan-dan-tenaga-pendidikan') }}">Pendidikan Dan Tenaga Pendidikan</a></li>
                                            <li><a href="{{ url('/tentang-kami/galeri') }}">Galeri</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pendidikan</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Jenjang</a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('/pendidikan/jenjang/smp-budi-luhur') }}">SMP Budi Luhur</a></li>
                                                    <li><a href="{{ url('/pendidikan/jenjang/sma-budi-luhur') }}">SMA Budi Luhur</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ url('/pendidikan/prestasi-sekolah') }}">Prestasi Sekolah</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">E-Learning</a>
                                        <ul class="dropdown" style="width:250px;">
                                            <li><a href="http://smp-blbs-smr.sch.id/">E-Learning SMP Budi Luhur</a></li>
                                            <li><a href="https://sma-blbs-smr.sch.id/cbtonline/">CBT Online SMA Budi Luhur</a></li>
                                            <li><a href="https://e-learning.sma-blbs-smr.sch.id/">E-Learning SMA Budi Luhur</a></li>
                                            <li><a href="{{ url('/streaming') }}">Streaming</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('/lokasi') }}">Lokasi</a></li>
                                </ul>

                                <!-- Search Form -->
                                <!-- <div class="search-form">
                                    <form action="#" method="get">
                                        <input type="search" name="search" class="form-control" placeholder="Search and hit enter...">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div> -->

                                <!-- Social Button -->
                                <div class="top-social-info">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <!-- <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS Feed"><i class="fa fa-rss" aria-hidden="true"></i></a> -->
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->