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
                            <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->nama_kategori }}</li>
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
                <div class="col-12">

                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-content">

                            <div class="text-center mb-50">
                                <p class="post-date">{{date_format(date_create($data->tanggal_artikel),"M d, Y")}} / {{$data->nama_kategori}}</p>
                                <h2 class="post-title">{{$data->judul_artikel}}</h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <a href="#"><span>by</span> {{$data->nama}} </a>
                                    {{-- <a href="#">03 <span>Comments</span></a> --}}
                                </div>
                            </div>

                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <img src="{{ asset('assets/foto_artikel/'.$data->foto_artikel) }}" alt="">
                            </div>

                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->
                                <div class="post-share">
                                    <span>Share</span>
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                                </div>
                                 {!!$data->isi_artikel!!}   
                                <!-- Related Post Area -->
                                <div class="related-posts clearfix">
                                    <!-- Headline -->
                                    <h4 class="headline">related posts</h4>

                                    <div class="row">
                                        @foreach($related_post->showRelated($data->id_artikel,$data->id_kategori_artikel) as $related)
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="#"><img src="{{ asset('assets/foto_artikel/'.$related->foto_artikel) }}" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date">{{ date_format(date_create($related->tanggal_artikel),"M d, Y") }} / {{ $related->nama_kategori }}</p>
                                                    <a href="#" class="post-title">
                                                        <h4>{!! $related->judul_artikel !!}</h4>
                                                    </a>
                                                    <p class="post-excerpt">{!! moreArticle($related->isi_artikel) !!}</p>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="comment_area clearfix">
                                <!-- Comment Area Start -->
                                <div id="disqus_thread"></div>
                                <script>

                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://sma-blbs-smr-sch-id.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                <script id="dsq-count-scr" src="//sma-blbs-smr.sch.id.disqus.com/count.js" async></script>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

<!-- ##### Blog Content Area End ##### -->
@endsection