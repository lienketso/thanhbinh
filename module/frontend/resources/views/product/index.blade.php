@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{upload_url($catInfor->background)}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{$catInfor->name}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="Trang chủ" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="" title="" itemprop="url">{{trans('frontend.product')}}</a></li>
                        <li class="breadcrumb-item active">{{$catInfor->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #F6F6F6">
        <div class="gap">
            <div class="container">
                <div class="evnt-sec remove-ext5">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="sidebar_product">
                                <div class="list_sidebar">
                                    <h3>{{trans('frontend.categories')}}</h3>
                                    <div class="content_catpro">
                                        <div id="accordion">

                                            @foreach($allCatProduct as $key=>$val)
                                            <div class="card-fix ">
                                                <div class="card-header-fix {{($catInfor->id==$val->id) ? 'acc-active' : ''}}" id="heading_{{$val->id}}">
                                                    <h5 class="mb-0 title_acc">
                                                        <button class="btn btn-link-fix {{($catInfor->id==$val->id) ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#collapse_{{$val->id}}"
                                                                aria-expanded="{{($catInfor->id==$val->id) ? 'true' : 'false'}}"
                                                                aria-controls="collapse_{{$val->id}}">
                                                            {{$val->name}}
                                                        </button>
                                                        <span><i class="fa fa-angle-down"></i></span>
                                                    </h5>
                                                </div>

                                                <div id="collapse_{{$val->id}}" class="collapse {{($catInfor->id==$val->id) ? 'show' : ''}}" aria-labelledby="heading_{{$val->id}}" data-parent="#accordion">
                                                    <div class="card-body">
                                                        @if(!empty($val->getProductCat) && count($val->getProductCat)>0)
                                                        <ul class="list_sb_cat">
                                                            @foreach($val->getProductCat as $d)
                                                            <li><a href="{{route('frontend::product.detail.get',$d->slug)}}">{{$d->name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                            @endif

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                        @foreach($data as $d)
                        <div class="col-md-4 col-sm-6 col-6 col-lg-4">
                            <div class="evnt-bx2">
                                <div class="evnt-thmb fix-thumb">
                                    <a href="{{route('frontend::product.detail.get',$d->slug)}}" title="" itemprop="url">
                                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                             alt="{{$d->name}}" itemprop="image">
                                    </a>

                                </div>
                                <div class="bg-white desc_pro">
                                    <h5 itemprop="headline" class="title_tao">
                                        <a href="{{route('frontend::product.detail.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">{{$d->name}}</a>
                                    </h5>
                                    <a class="theme-btn-cc" href="{{route('frontend::product.detail.get',$d->slug)}}"
                                       title="{{$d->name}}" itemprop="url">{{trans('frontend.view_product')}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="pgn-wrp text-center">
                   {{$data->links()}}
                </div>
            </div>
        </div>
    </section>
    @endsection
