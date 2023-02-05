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
                            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
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
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">
                           
                            <!-- Section Heading -->
                            <div class="col-12">
                                <div class="section-heading">
                                    <h2>List Artikel</h2>
                                </div>
                            </div>
                            @foreach($artikel as $key => $data)
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
                            <!-- Single Blog Post -->
                        </div>
                    </div>

                    <!-- Pager -->
                    @if($artikel->total() > 6)
                    <div class="d-flex align-items-center justify-content-center">
                        {{ $artikel->links() }}
                    </div>
                    @else
                    <div class="d-flex align-items-center justify-content-center">
                        <ul class="pagination" role="navigation">
                            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item">
                                <span class="page-link" aria-label="Next &raquo;">&rsaquo;</span>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-50">
                            <form class="search-form" action="{{ url('/artikel/cari') }}" method="get">
                                <input type="search" name="cari" class="form-control" placeholder="Cari Artikel...">
                                <button><i class="fa fa-send"></i></button>
                            </form>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Kategori</h6>
                            </div>
                            <ol class="nikki-catagories">
                                @foreach($kategori_artikel->all() as $data)
                                <li><a href="{{ url('/artikel/kategori/'.$data->slug_kategori) }}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $data->nama_kategori }}</span> <span>({{$kategori_artikel->count($data->id_kategori_artikel)}})</span></a></li>
                                @endforeach
                            </ol>
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

@endsection