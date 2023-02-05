@extends('Main.layout-app.layout')

@section('content')


    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="circle-preloader">
                <div class="a" style="--n: 5;">
                    <div class="dot" style="--i: 0;"></div>
                    <div class="dot" style="--i: 1;"></div>
                    <div class="dot" style="--i: 2;"></div>
                    <div class="dot" style="--i: 3;"></div>
                    <div class="dot" style="--i: 4;"></div>
                </div>
            </div>
        </div>

        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            @foreach($slider as $data)
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <!-- <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url(/assets/img/blog-img/13.jpg);"></div> -->
                <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url({{ asset('assets/foto_artikel/'.$data->foto_artikel) }});"></div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms">{{ date_format(date_create($data->tanggal_artikel),"M d, Y") }} / {{ $data->nama_kategori }}</p>
                        <a href="#" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2>{{ $data->judul_artikel }}</h2>
                        </a>
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">{!!moreArticle($data->isi_artikel)!!}</p>
                        <a href="{{ url('/artikel/'.$data->judul_slug_artikel) }}" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Selengkapnya</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-100">
        <div class="container">

            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">

                            <!-- Featured Post Area -->
                            <div class="col-12">
                                <div class="featured-post-area mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail mb-30">
                                        <a href="{{ url('/artikel/'.$artikel_populer->judul_slug_artikel) }}"><img src="{{asset('assets/foto_artikel/'.$artikel_populer->foto_artikel)}}" alt=""></a>
                                    </div>
                                    <!-- Featured Post Content -->
                                    <div class="featured-post-content">
                                        <p class="post-date">{{ date_format(date_create($artikel_populer->tanggal_artikel),"M d, Y") }} / {{ $artikel_populer->nama_kategori }}</p>
                                        <a href="{{ url('/artikel/'.$artikel_populer->judul_slug_artikel) }}" class="post-title">
                                            <h2>{{ $artikel_populer->judul_artikel }}</h2>
                                        </a>
                                        <p class="post-excerpt">{!!moreArticle($artikel_populer->isi_artikel)!!}</p>
                                    </div>
                                    <!-- Post Meta -->
                                    <div class="post-meta d-flex align-items-center justify-content-between">
                                        <!-- Author Comments -->
                                        <div class="author-comments">
                                            <a href="#"><span>by</span> {{ $artikel_populer->nama }}</a>
                                            {{-- <a href="#">03 <span>Comments</span></a> --}}
                                        </div>
                                        <!-- Social Info -->
                                        <div class="social-info">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($artikel as $data)
                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="{{ url('/artikel/'.$data->judul_slug_artikel) }}"><img src="{{asset('assets/foto_artikel/'.$data->foto_artikel)}}" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">{{ date_format(date_create($data->tanggal_artikel),"M d, Y") }} / {{ $data->nama_kategori }}</p>
                                        <a href="{{ url('/artikel/'.$data->judul_slug_artikel) }}" class="post-title">
                                            <h4>{{ $data->judul_artikel }}</h4>
                                        </a>
                                        <p class="post-excerpt">{!!moreArticle($data->isi_artikel)!!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="{{ url('/artikel') }}">Selengkapnya</a></li>
                    </ol>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Subscribe &amp; Follow</h6>
                            </div>
                            <!-- Widget Social Info -->
                            <div class="widget-social-info text-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Artikel Populer</h6>
                            </div>
                            
                            @foreach($popular_artikel as $data)
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img src="{{asset('assets/foto_artikel/'.$data->foto_artikel)}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#" class="post-title">
                                        <h6>{{ $data->judul_artikel }}</h6>
                                    </a>
                                    <a href="#" class="post-author"><span>by</span> {{ $data->nama }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>popular tags</h6>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                @foreach($popular_tag as $data)
                                <li><a href="{{ url('/artikel/kategori/'.$data->slug_kategori) }}">{{ $data->nama_kategori }}</a></li>
                                @endforeach
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->

    <!-- ##### Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="instagram-content d-flex flex-wrap align-items-center">

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/1.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/asad.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/2.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/5.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/3.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/7.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/1.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="{{ asset('assets/img/img-support/pramuka.JPG') }}" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- ##### Instagram Area End ##### -->
@endsection