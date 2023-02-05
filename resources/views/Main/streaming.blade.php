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
            <div>
    	        <marquee height="55" style="background-color: #0e8119; color:#fff; font-size: large; padding: 14px;">
    				PERHATIAN !!! DIMOHON AMAL SHOLIH MENGIKUTI PENGAJIAN DI WEBSITE RESMI ( sma-blbs-smr.sch.id ) DAN DILARANG RE-UPLOAD, SHARE / MENYEBARKAN PENGAJIAN ONLINE INI, BAIK BERUPA AUDIO-VIDEO ATAUPUN AUDIO SAJA.
    			</marquee>
            </div>
            <div class="container">
                <div class="embed-responsive embed-responsive-21by9">
                    {{-- @foreach($streaming as $data) --}}
    				<iframe class="embed-responsive-item" src="{{playYoutube($streaming->link_streaming)}}" allowfullscreen></iframe>
                    {{-- @endforeach --}}
    			</div>

                <hr>
                <h5><center>UNTUK AUDIO SAJA KLIK DIBAWAH INI</center></h5>
                <p><center><a href="#" rel="nofollow" target="_blank"><img border="0" data-original-height="67" data-original-width="200" src="https://1.bp.blogspot.com/-_w6-kZFutXs/XpwISLtHuvI/AAAAAAAAABw/3YsmTBkpKYEzaYbSvkytLc-ipcLNVs_cwCLcBGAsYHQ/s1600/AUDIO.png" /></a></center></p>
                <hr>
                <div>
                    <h5 class="text-center">UNTUK PENDERESAN KLIK DIBAWAH INI</h5>
                    <p><center> <a  href="{{ url('/penderesan')}}"  rel="nofollow" target="_blank"><img border="0" data-original-height="67" data-original-width="200" src="https://1.bp.blogspot.com/-8fmuXKNwp4w/XpwISHyOPzI/AAAAAAAAAB0/6nyOVDH8nzQzAMawN1GM_3eW325kQbAIgCLcBGAsYHQ/s1600/PENDERESAN.png" /></a></center></p>
                </div>
                    <h5>Jadwal Streaming Pengajian Asrama Himpunan Hadis Online</h5>
                <div>
                    <table class="table table-striped table-bordered" style="width:30%;margin-left: auto; margin-right: auto;">
                      <thead>
                        <tr>
                          <th scope="col">SESI</th>
                          <th scope="col">MULAI</th>
                          <th scope="col">AKHIR</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @forelse($jadwal_streaming as $key => $data)
                          <th scope="row">{{ $key+1 }}</th>
                          <td>{{ $data->dari }} WITA</td>
                          <td>{{ $data->sampai }} WITA</td>
                        @empty
                            <td colspan="3">TIDAK ADA JADWAL</td>
                        @endforelse
                        </tr>
                        </tbody>
                    </table>
                    <h6 class="text-danger">Ket : Jadwal bisa berubah sewaktu-waktu dengan pemberitahuan sebelumnya.</h6>
                    
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection