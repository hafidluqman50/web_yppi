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
                            <li class="breadcrumb-item active" aria-current="page">Pendidik & Tenaga Kependidikan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
                        <div class="row">
                           
                            <!-- Section Heading -->
                            <div class="col-12">
                                <div class="section-heading">
                                    <h2 style="text-align:center">GURU KAMI</h2>
                                    <!-- <p>Post categories: uhuy</p> -->
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-4">
                                <div class="single-blog-post mb-50">
                                    <!-- Content -->
                                    <div class="post-content text-center">
                                        <p class="post-date"> TIK </p>
                                        <a href="#" class="post-title">
                                            <h4>Khoirulli Nurul Fatimah</h4>
                                        </a>
                                    </div>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="{{asset('assets/img/img-support/5.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-4">
                                <div class="single-blog-post mb-50">
                                    <!-- Content -->
                                    <div class="post-content text-center">
                                        <p class="post-date"> MATEMATIKA </p>
                                        <a href="#" class="post-title">
                                            <h4>Khoirulli Nurul Fatimah</h4>
                                        </a>
                                    </div>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="{{asset('assets/img/img-support/5.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-4">
                                <div class="single-blog-post mb-50">
                                    <!-- Content -->
                                    <div class="post-content text-center">
                                        <p class="post-date"> KIMIA </p>
                                        <a href="#" class="post-title">
                                            <h4>Khoirulli Nurul Fatimah</h4>
                                        </a>
                                    </div>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="{{asset('assets/img/img-support/5.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-4">
                                <div class="single-blog-post mb-50">
                                    <!-- Content -->
                                    <div class="post-content text-center">
                                        <p class="post-date"> BAHASA INDONESIA </p>
                                        <a href="#" class="post-title">
                                            <h4>Khoirulli Nurul Fatimah</h4>
                                        </a>
                                    </div>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="{{asset('assets/img/img-support/5.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-4">
                                <div class="single-blog-post mb-50">
                                    <!-- Content -->
                                    <div class="post-content text-center">
                                        <p class="post-date"> BAHASA INGGRIS </p>
                                        <a href="#" class="post-title">
                                            <h4>Khoirulli Nurul Fatimah</h4>
                                        </a>
                                    </div>
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="{{asset('assets/img/img-support/5.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Sidebar Area -->
                
            </div>
        </div>
    </section>
<!-- ##### Blog Content Area End ##### -->

@endsection