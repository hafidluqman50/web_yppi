@extends('Main.layout-app.layout')

@section('content')

<!-- ##### Breadcrumb Area Start ##### -->
	    <div class="breadcrumb-area">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <nav aria-label="breadcrumb">
	                        <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Tentang Kami</a></li>
	                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
	                        </ol>
	                    </nav>
	                </div>
	            </div>
	        </div>
	    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <div class="about-us-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>{{ $title }}</h2>
                        </div>

                        <div class="about-text">
                            <p>{!!$data->konten!!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection