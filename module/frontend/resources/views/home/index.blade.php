@extends('frontend::master')
@section('content')
    <section>
        <div class="gap no-gap">
            <div class="featured-area-wrap text-center">
                <div class="featured-car owl-carousel">
                    @foreach($gallery as $d)
                    <div class="featured-item" style="background-image: url('{{upload_url($d->thumbnail)}}');">
                        <div class="featured-cap">
                            <span>, </span>
                            <h2><span class="theme-clr"> {{$d->name}}</span> {{$d->title}}</h2>
                            <p>{{$d->description}}</p>
                            <div class="btns-grp">
                                <a class="theme-btn brd-rd30" href="{{$d->link}}" title="">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="giaiphap_home">
        <div class="gap_cc">
            <div class="container">
                <div class="tem-sec remove-ext5 text-center">
                    <div class="row">
                        @foreach($popularCat as $d)
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="tm-bx">
                                <div class="tm-thmb">
                                    <a href="{{route('frontend::product.index.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">
                                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                             alt="{{$d->name}}" itemprop="image">
                                    </a>
                                </div>
                                <div class="tm-inf fix-desc">
                                    <h5 itemprop="headline" class="title_gp">
                                        <a href="{{route('frontend::product.index.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">{{$d->name}}</a>
                                    </h5>
                                    <div class="desc_gp">
                                        {{$d->meta_desc}}
                                    </div>
                                    <div class="btn-tuvan"><a href="{{route('frontend::product.index.get',$d->slug)}}">Tư vấn giải pháp</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <a class="floter-911" href="#" title="" itemprop="url"><img src="assets/images/911-icon.png" alt="911-icon.png" itemprop="image"></a>
        </div>
    </section>

    @if(!empty($pageAbout))
    <section>
        <div class="gap">
            <div class="container">
                <div class="abt-sec style-edit">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-lg-7">
                            <div class="abt-cnt">
                                <div class="sec-tl-cac">
                                    <h2 itemprop="headline"><span class="theme-clr">{{$pageAbout->name}}</span></h2>
                                </div>
                                <div class="abt-desc">
                                    {!! $pageAbout->content !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-lg-5">
                            <div class="abt-img style2">
                                <img src="{{upload_url($pageAbout->thumbnail)}}" alt="{{$pageAbout->name}}" itemprop="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    <div class="sec-tl text-center">
        <span>Danh sách dịch vụ và lĩnh vực hoạt động</span>
        <h2 itemprop="headline">Lĩnh vực & <span class="theme-clr">Dịch vụ</span></h2>
    </div>

    <section class="services_home">


        <div class="wrap-service">
           @foreach($linhVuc as $d)
            <div class="listwrap_sv item1" style="background-image: url('{{upload_url($d->thumbnail)}}');">
                <a href="{{route('frontend::page.index.get',$d->slug)}}">
                    <h3 class="title_service">{{$d->name}}</h3>
                </a>
            </div>
            @endforeach


        </div>
    </section>

    <section class="pdt50">
        <div class="gap remove-gap">
            <div class="container">
                <div class="sec-tl text-center">
                    <h2 itemprop="headline">Tin tức & <span class="theme-clr">Sự kiện</span></h2>
                </div>
                <div class="blg-evnt-wrp">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="remove-ext5">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="blg-bx">
                                            <div class="blg-thmb"><a href="blog-detail.html" title="" itemprop="url"><img src="assets/images/blg-img1-3.jpg" alt="blg-img1-1.jpg" itemprop="image"></a></div>
                                            <div class="blg-inf">
                                                <h6 itemprop="headline"><a href="blog-detail.html" title="" itemprop="url">Lorem ipsum dolor sit amet </a></h6>
                                                <ul class="pst-mta">
                                                    <li><i class="far fa-calendar-alt"></i><a href="#" title="" itemprop="url">08 tháng 6, 2020</a></li>
                                                    <li><i class="fas fa-user"></i><a href="#" title="" itemprop="url">Admin</a></li>
                                                </ul>
                                                <p itemprop="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                                                <a href="blog-detail.html" title="" itemprop="url">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="blg-bx">
                                            <div class="blg-thmb"><a href="blog-detail.html" title="" itemprop="url"><img src="assets/images/blg-img1-7.jpg" alt="blg-img1-2.jpg" itemprop="image"></a></div>
                                            <div class="blg-inf">
                                                <h6 itemprop="headline"><a href="blog-detail.html" title="" itemprop="url">Lorem ipsum dolor sit amet</a></h6>
                                                <ul class="pst-mta">
                                                    <li><i class="far fa-calendar-alt"></i><a href="#" title="" itemprop="url">08 tháng 6, 2020</a></li>
                                                    <li><i class="fas fa-user"></i><a href="#" title="" itemprop="url">Admin</a></li>
                                                </ul>
                                                <p itemprop="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                                                <a href="blog-detail.html" title="" itemprop="url">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="evnt-wrp">
                                <div class="evnt-bx">
                                    <span class="evnt-dat"><a class="theme-bg" href="#" title="" itemprop="url">08<i>T6</i></a></span>
                                    <div class="evnt-inf">
                                        <h5 itemprop="headline"><a href="event-detail.html" title="" itemprop="url">Lorem ipsum dolor sit amet</a></h5>
                                        <p itemprop="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                                        <a class="event-btn" href="event-detail.html" title="" itemprop="url">Xem thêm</a>
                                    </div>
                                </div>
                                <div class="evnt-bx">
                                    <span class="evnt-dat"><a class="theme-bg" href="#" title="" itemprop="url">08<i>T6</i></a></span>
                                    <div class="evnt-inf">
                                        <h5 itemprop="headline"><a href="event-detail.html" title="" itemprop="url">Lorem ipsum dolor sit amet</a></h5>
                                        <p itemprop="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <a class="event-btn" href="event-detail.html" title="" itemprop="url">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap black-layer opc8">
            <div class="fixed-bg" style="background-image: url(assets/images/para-new.png);"></div>
            <div class="container">
                <div class="shrt-fcts-wrp">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-lg-5">
                            <img class="facts-mockup animated bounce" src="assets/images/fact-mockup.png" alt="mockup-image">
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="fcts-wrp">
                                <div class="sec-tl">
                                    <span>Youth Fire Stop Prevention &amp; Intervention Program.</span>
                                    <h2 itemprop="headline">Few Facts About Naar</h2>
                                </div>
                                <p itemprop="description">Every live, every property we save does matter, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                                <ul class="fcts-lst">
                                    <li><span class="counter">369</span><h6 itemprop="headline">Emergencies</h6></li>
                                    <li><span class="counter">421</span><h6 itemprop="headline">Traffic Crashes</h6></li>
                                    <li><span class="counter">275</span><h6 itemprop="headline">Fire Emergencies</h6></li>
                                    <li><span class="counter">50</span><h6 itemprop="headline">Year of Experience</h6></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12 col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap theme-bg-layer opc7 hlf-parallax">
            <div class="fixed-bg" style="background-image: url(../assets/images/s31.jpg);"></div>
            <div class="sec-tl text-center">
                <span>We provide you with practical actions, advice and resources.</span>
                <h2 itemprop="headline">Sản phẩm nổi bật</h2>
            </div>
            <div class="vdo-sec-wrp">
                <div class="vdo-car owl-carousel">
                    @foreach($productHot as $d)
                    <div class="vdo-bx-fix">
                        <a href="" class="img_product">
                            <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                 alt="{{$d->name}}" itemprop="image">
                        </a>
                        <h3 class="title_product">{{$d->name}}</h3>
                        <p>{{$d->description}}</p>
                        <div class="btn_xemthem">
                            <a href="#">Xem sản phẩm</a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

    <section style="padding-bottom: 60px">
        <div class="gap-cac">
            <div class="container">
                <div class="sec-tl text-center">
                    <h2 itemprop="headline">Dự án <span class="theme-clr">Tiêu biểu</span></h2>
                </div>
                <div class="camp-wrp remove-ext5">
                    <div class="row">
                        @foreach($projectHot as $d)
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="camp-bx">
                                <div class="camp-thmb">
                                    <a href="#" title="" itemprop="url">
                                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="camp-img1.jpg" itemprop="image">
                                    </a>
                                    <div class="camp-inf">
                                        <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{$d->name}}</a></h5>
                                        <span><i class="fas fa-map-marker-alt theme-clr"></i>{{$d->address}}</span>
                                    </div>
                                </div>
                                <div class="prg-wrp">
                                    <div class="progress">
                                        <div class="progress-bar w30 theme-bg"></div>
                                    </div>
                                    <span class="rs-gl float-left">Giá trị thầu : <i class="theme-clr">{{$d->price_value}}</i></span>
                                    <span class="rs-gl float-right">Hoàn thành : <i class="theme-clr">{{$d->end_date}}</i></span>
                                    <a class="theme-btn brd-rd5" href="#" title="" itemprop="url">Xem</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
