@extends('Main.layout-app.layout')

@section('content')

<div class="container-fluid">
	<div>
		<div class="nikki-pager" style="justify-content: center">
            <img style="width: 120px" src="{{ asset('assets/img/pondok.png')}}" alt="">
        </div>
        <div class="row text-center">
            <div class="col-12">
            	<h2>Pengajian Online</h2>
            	<h2>Ponpes Al-Aziziyah Samarinda</h2>
            </div>
            <!-- <div>
    	        <marquee height="55" style="background-color: #0e8119; color:#fff; font-size: large; padding: 14px;">  				 
                PENDERESAN ASRAMA HIMPUNAN HADIS ONLINE 2020 AKAN TERSEDIA DALAM WAKTU 1X24 JAM
    			</marquee>
            </div> -->
            <div>
                <marquee height="55" style="background-color: #0e8119; color:#fff; font-size: large; padding: 14px;">
                     PENDERESAN ASRAMA HIMPUNAN HADIS ONLINE 2020 AKAN TERSEDIA DALAM WAKTU 1X24 JAM &nbsp;&nbsp;&nbsp;
                     PENDERESAN ASRAMA HIMPUNAN HADIS ONLINE 2020 AKAN TERSEDIA DALAM WAKTU 1X24 JAM
                </marquee>
            </div>
            <div class="container">
                @foreach($penderesan as $data)
                    <div>
                        {{-- <h5>K. SHOLAH : 64 - 73</h5>
                        <h5>PENYAMPAIAN MATERI OLEH BP. H. HARIYONO ICHSAN, S.Pd.I</h5> --}}
                        <h5>{{ $data->judul_streaming }}</h5>
                    </div>
                <div class="embed-responsive embed-responsive-21by9">

                    <!-- {{-- @foreach($streaming as $data) --}} -->
    				<iframe class="embed-responsive-item" src="{{ playYoutube($data->link_streaming) }}" allowfullscreen></iframe>
                    <!-- {{-- @endforeach --}} -->
    			</div>
                <hr>
                @endforeach
                <div>
                    <br>
                    <h6 class="text-center">KLIK TOMBOL STREAMING DI BAWAH INI UNTUK MENGIKUTI PENGAJIAN ASRAMA ONLINE</h6>
                    <p><a href="{{ url('/streaming') }}"><img border="0" data-original-height="67" data-original-width="200" src="https://1.bp.blogspot.com/-ozy3PJXcS2g/Xp2rv_68koI/AAAAAAAAbOM/4prAW1upM2It5nw1d84sLFRcUY5W6pOXQCLcBGAsYHQ/s1600/STREAMING.png" /></a></p>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection