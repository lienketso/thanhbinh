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
                                <a class="theme-btn brd-rd30" href="{{$d->link}}" title="">{{trans('frontend.read_more')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    @if(!empty($popularCat) && count($popularCat)>0)
    <section class="giaiphap_home " >
        <div class="gap_cc">
            <div class="container">
                <div class="tem-sec remove-ext5 text-center">
                    <div class="row">

                        @foreach($popularCat as $key=>$d)
                        <div class="col-md-4 col-sm-6 col-lg-3 wow bounceInLeft" data-wow-duration="{{$key}}s" data-wow-iteration="1" >
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
                                    <div class="btn-tuvan"><a href="{{route('frontend::product.index.get',$d->slug)}}">{{trans('frontend.solution_consulting')}}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif

    @if(!empty($pageAbout))
    <section class="">
        <div class="gap">
            <div class="container">
                <div class="abt-sec style-edit wow flipInX" data-wow-iteration="1">
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
        <span>{{$setting['keyword_1_'.$lang]}}</span>
        <h2 itemprop="headline"><span class="theme-clr">{{$setting['keyword_2_'.$lang]}}</span></h2>
    </div>

    <section class="services_home">


        <div class="wrap-service-cac">
            <div class="owl-carousel owl-linhvuc">
           @foreach($linhVuc as $key=>$d)
            <div class="item item_lv" style="background-image: url('{{upload_url($d->thumbnail)}}');">
                <a href="{{route('frontend::page.index.get',$d->slug)}}">
                    <h3 class="title_service">{{$d->name}}</h3>
                </a>
            </div>
            @endforeach
            </div>

        </div>
    </section>

    <section class="pdt50">
        <div class="gap remove-gap">
            <div class="container">
                <div class="sec-tl text-center">
                    <h2 itemprop="headline"><span class="theme-clr">{{$setting['keyword_3_'.$lang]}}</span></h2>
                </div>
                <div class="blg-evnt-wrp">
                    <div class="tab_news">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            @foreach($catnewsHome as $key=>$d)
                            <li class="nav-tab-item">
                                <a class="nav-link {{($key==0) ? 'active' : ''}}" data-toggle="tab" href="#menu{{$d->id}}"><i class="fas fa-newspaper"></i> {{$d->name}}</a>
                            </li>
                            @endforeach

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content tab_content_news">
                            @foreach($catnewsHome as $key=>$d)
                            <div class="tab-pane {{($key==0) ? 'active' : ''}} container" id="menu{{$d->id}}">
                                <div class="row">
                                    @if(!empty($d->postCat))
                                        @foreach($d->postCat->take(3) as $p)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="blg-bx">
                                            <div class="blg-thmb blg-fix">
                                                <a href="{{route('frontend::blog.detail.get',$p->slug)}}" title="{{$p->name}}" itemprop="url">
                                                    <img src="{{ ($p->thumbnail!='') ? upload_url($p->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                                         alt="{{$p->name}}" itemprop="image"></a>
                                            </div>
                                            <div class="blg-inf">
                                                <h6 itemprop="headline">
                                                    <a href="{{route('frontend::blog.detail.get',$p->slug)}}" title="{{$p->name}}"
                                                                           itemprop="url">{{sub($p->name,70)}} ...</a>
                                                </h6>
{{--                                                <ul class="pst-mta">--}}
{{--                                                    <li><i class="far fa-calendar-alt"></i>{{stringDate($p->created_at)}}</li>--}}
{{--                                                    <li><i class="fas fa-user"></i> {{trans('frontend.count_view')}} : {{$p->count_view}}</li>--}}
{{--                                                </ul>--}}
                                                <p itemprop="description">{{cut_string($p->description,90)}}</p>
                                                <a href="{{route('frontend::blog.detail.get',$p->slug)}}" title="{{$p->name}}" itemprop="url">{{trans('frontend.read_more')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap black-layer opc8">
            <div class="fixed-bg" style="background-image: url('{{upload_url($setting['fact_background'])}}');"></div>
            <div class="container">
                <div class="shrt-fcts-wrp">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-lg-5">
                            <div class="fact_image">
                                <img class="" src="{{upload_url($setting['fact_image'])}}" alt="{{$setting['fact_title_2_'.$lang]}}">
                                <h3>Công ty TNHH MTV Thanh Bình – BCA</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="fcts-wrp">
                                <div class="sec-tl">
                                    <span>{{$setting['fact_title_1_'.$lang]}}</span>
                                    <h2 itemprop="headline">{{$setting['fact_title_2_'.$lang]}}</h2>
                                </div>
                                <p itemprop="description">{{$setting['fact_description_'.$lang]}}</p>
                                <ul class="fcts-lst">
                                    <li><span class="counter">{{$setting['fact_number_1_'.$lang]}}</span><h6 itemprop="headline">{{$setting['fact_name_1_'.$lang]}}</h6></li>
                                    <li><span class="counter">{{$setting['fact_number_2_'.$lang]}}</span><h6 itemprop="headline">{{$setting['fact_name_2_'.$lang]}}</h6></li>
                                    <li><span class="counter">{{$setting['fact_number_3_'.$lang]}}</span><h6 itemprop="headline">{{$setting['fact_name_3_'.$lang]}}</h6></li>
                                    <li><span class="counter">{{$setting['fact_number_4_'.$lang]}}</span><h6 itemprop="headline">{{$setting['fact_name_4_'.$lang]}}</h6></li>
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
        <div class="gap theme-bg-layer opc9 hlf-parallax">
            <div class="fixed-bg" style="background-image: url('{{public_url('frontend/assets/images/parallax1.jpg')}}');"></div>
            <div class="sec-tl text-center">
                <span>{{$setting['keyword_4_'.$lang]}}</span>
                <h2 itemprop="headline">{{$setting['keyword_5_'.$lang]}}</h2>
            </div>
            <div class="vdo-sec-wrp">
                <div class="vdo-car owl-carousel">
                    @foreach($productHot as $d)
                    <div class="vdo-bx-fix">
                        <a href="{{route('frontend::product.detail.get',$d->slug)}}" class="img_product">
                            <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                 alt="{{$d->name}}" itemprop="image">
                        </a>
                        <h3 class="title_product">{{$d->name}}</h3>
                        <p>{{cut_string($d->description,120)}}</p>
                        <div class="btn_xemthem">
                            <a href="{{route('frontend::product.detail.get',$d->slug)}}">{{trans('frontend.view_product')}}</a>
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
                    <h2 itemprop="headline"><span class="theme-clr">{{$setting['keyword_6_'.$lang]}}</span></h2>
                </div>
                <div class="camp-wrp remove-ext5">
                    <div class="row">
                        @foreach($projectHot as $d)
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="camp-bx">
                                <div class="camp-thmb">
                                    <a href="{{route('frontend::solution.detail.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">
                                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                             alt="{{$d->name}}" itemprop="image">
                                    </a>
                                    <div class="camp-inf">
                                        <h5 itemprop="headline"><a href="{{route('frontend::solution.detail.get',$d->slug)}}"
                                                                   title="{{$d->name}}" itemprop="url">{{$d->name}}</a></h5>
                                    </div>
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
