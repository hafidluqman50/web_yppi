@extends('Main.layout-app.layout')

@section('content')

	<!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lokasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Google Maps Start ##### -->
    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
    </div>
    <!-- ##### Google Maps End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
		            <div class="widget">
		              	<address>
		          			<strong>YPPI-HUD Samarinda</strong><br>
                            Jl. Bugis RT 02 Kel. Mugirejo Kec. Sungai Pinang<br>
                            Samarinda – Kaltim
		           		</address>
		              	<p>
		                	<i class="icon-phone"></i> (0541) XXXXXXX <br>
                            <i class="icon-envelope-alt"></i> yppi-hud@gmail.com
		              	</p>
		            </div>
		        </div>
                <div class="col-lg-4">
		            <div class="widget">
		              	<address>
		          			<strong>SMP BUDI LUHUR Samarinda</strong><br>
                            Jl. Bugis RT 02 Kel. Mugirejo Kec. Sungai Pinang<br>
                            Samarinda – Kaltim
		           		</address>
		              	<p>
		                	<i class="icon-phone"></i> (0541) XXXXXXX <br>
                            <i class="icon-envelope-alt"></i> smpplusbudiluhur@gmail.com
		              	</p>
		            </div>
		        </div>
                <div class="col-lg-4">
		            <div class="widget">
		              	<address>
		          			<strong>SMA BUDI LUHUR Samarinda</strong><br>
                            Jl. Bugis RT 02 Kel. Mugirejo Kec. Sungai Pinang<br>
                            Samarinda – Kaltim
		           		</address>
		              	<p>
		                	<i class="icon-phone"></i> (0541) XXXXXXX <br>
                            <i class="icon-envelope-alt"></i> smaplusbudiluhur@gmail.com
		              	</p>
		            </div>
		        </div>

            </div>
            <br><br>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

@endsection