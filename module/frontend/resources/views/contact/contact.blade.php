@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{public_url('frontend/assets/images/page-title.jpg')}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{trans('frontend.contact_us')}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="{{trans('frontend.home')}}" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('frontend.contact_us')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="gap">
            <div class="container">
                <div class="cnt-wrp">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-lg-8">
                            <div class="cnt-frm">
                                <h4 itemprop="headline">{{trans('frontend.contact_with_us')}}</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list_alert">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input type="text" name="name" placeholder="{{trans('frontend.name')}}...">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input type="email" name="email" placeholder="{{trans('frontend.email')}}">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input type="text" name="title" placeholder="{{trans('frontend.subject')}}...">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <textarea placeholder="{{trans('frontend.messenger')}}" name="messenger"></textarea>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <button type="submit" class="theme-btn brd-rd5">{{trans('frontend.submit_now')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <div class="cnt-inf-wrp">
                                <h4 itemprop="headline">{{trans('frontend.contact_info')}}</h4>
                                <ul class="cnt-inf-lst">
                                    <li><i class="fas fa-envelope theme-clr"></i> <strong>Email</strong><a href="#" title="" itemprop="url"><span>{{$setting['site_email_vn']}}</span></a>
                                        <a href="#" title="" itemprop="url">www.thanhbinh-bca.vn</a></li>
                                    <li><i class="fas fa-map-marker-alt theme-clr"></i> <strong>{{trans('frontend.address')}}</strong><span>{{$setting['site_address_'.$lang]}}</span></li>
                                    <li><i class="fas fa-phone theme-clr"></i> <strong>{{trans('frontend.phone')}}</strong>
                                        <span>{{$setting['site_hotline_'.$lang]}}</span><span>{{$setting['site_hotline_2_'.$lang]}}</span></li>
                                </ul>
                                <div class="scl4">
                                    <a href="{{$setting['site_twitter']}}" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="{{$setting['site_facebook']}}" title="Facebook" itemprop="url" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$setting['site_instagram']}}" title="Instagram" itemprop="url" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="map_contact">
            {!! $setting['site_goolge_map'] !!}
        </div>
    </section>
@endsection
