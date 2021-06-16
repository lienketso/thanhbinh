@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{public_url('frontend/assets/images/page-title.jpg')}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{trans('frontend.search')}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="{{trans('frontend.home')}}" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('frontend.search_result')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #F6F6F6">
        <div class="gap">
            <div class="container">
                <div class="result_name">{{trans('frontend.have_result')}} <strong>{{count($data)}}</strong> {{trans('frontend.result_with_keyword')}}  <span>"{{$name}}"</span></div>
                <div class="evnt-sec remove-ext5">
                    <div class="row">


                                @foreach($data as $d)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="evnt-bx2">
                                            <div class="evnt-thmb fix-thumb">
                                                <a href="{{route('frontend::product.detail.get',$d->slug)}}" title="" itemprop="url">
                                                    <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                                         alt="{{$d->name}}" itemprop="image">
                                                </a>

                                            </div>
                                            <div class="evnt-inf">
                                                <h5 itemprop="headline" class="title_tao">
                                                    <a href="{{route('frontend::product.detail.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">{{$d->name}}</a>
                                                </h5>
                                                <a class="theme-btn" href="{{route('frontend::product.detail.get',$d->slug)}}"
                                                   title="{{$d->name}}" itemprop="url">{{trans('frontend.view_product')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                    </div>
                </div>
                <div class="pgn-wrp text-center">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </section>

    @endsection
