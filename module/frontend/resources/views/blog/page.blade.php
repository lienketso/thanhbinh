@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{($data->banner!='') ? upload_url($data->banner) : public_url('frontend/assets/images/tech.png')}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{$data->name}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="Trang chủ" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item active">{{$data->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap">
            <div class="container">
                <div class="blog-detail-wrp">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="blog-detail">

                                <h1 class="title_blog_detail">{{$data->name}}</h1>
                                <div class="blog-detail-desc">
                                    {!! $data->content !!}
                                    <div class="pst-shr-tgs">
                                        <div class="scl4 float-left">
                                            <span>{{trans('frontend.share')}} :</span>
                                            <a href="https://twitter.com/intent/tweet?text={{$data->name}}&url={{route('frontend::blog.detail.get',$data->slug)}}&via=TWITTER-HANDLER" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a href="http://www.facebook.com/sharer/sharer.php?u={{route('frontend::blog.detail.get',$data->slug)}}"
                                               title="Facebook" itemprop="url" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#" title="Linkedin" itemprop="url" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </div>

                                    </div>
{{--                                    <div class="rltd-wrp">--}}
{{--                                        <h4 itemprop="headline">{{trans('frontend.related_post')}}</h4>--}}
{{--                                        <div class="remove-ext5">--}}
{{--                                            <div class="row">--}}
{{--                                                @foreach($related as $d)--}}
{{--                                                    <div class="col-md-3 col-sm-6 col-lg-3">--}}
{{--                                                        <div class="blg-bx">--}}
{{--                                                            <div class="blg-thmb blg_news">--}}
{{--                                                                <a href="{{route('frontend::page.index.get',$d->slug)}}" title="" itemprop="url">--}}
{{--                                                                    <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"--}}
{{--                                                                         alt="{{$d->name}}" itemprop="image">--}}
{{--                                                                </a>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="blg-inf-fix">--}}
{{--                                                                <h4 itemprop="headline">--}}
{{--                                                                    <a href="{{route('frontend::page.index.get',$d->slug)}}"--}}
{{--                                                                       title="{{$d->name}}" itemprop="url">{{$d->name}}</a></h4>--}}
{{--                                                                <p itemprop="description">{{cut_string($d->description,80)}}</p>--}}
{{--                                                                <a href="{{route('frontend::page.index.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">{{trans('frontend.read_more')}}</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
