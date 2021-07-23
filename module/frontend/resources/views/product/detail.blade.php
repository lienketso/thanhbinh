@extends('frontend::master')
@section('content')

    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{upload_url($catInforName->background)}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{$catInforName->name}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="" title="" itemprop="url">{{trans('frontend.product')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('frontend::product.index.get',$catInforName->slug)}}" title="" itemprop="url">{{$catInforName->name}}</a></li>
                        <li class="breadcrumb-item active">{{$data->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="gap">
            <div class="container">
                <div class="campaign-detail-wrp">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-lg-8">
                            <h1 class="title_product_page">{{$data->name}}</h1>
                            <div class="campaign-detail-desc">
                                {!! $data->content !!}
                                <div class="pst-shr-tgs">
                                    <div class="scl4 float-left">
                                        <span>{{trans('frontend.share')}} :</span>
                                        <a href="https://twitter.com/intent/tweet?text={{$data->name}}&url={{route('frontend::product.detail.get',$data->slug)}}&via=TWITTER-HANDLER"
                                           title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="http://www.facebook.com/sharer/sharer.php?u={{route('frontend::product.detail.get',$data->slug)}}"
                                           title="Facebook" itemprop="url" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" title="Linkedin" itemprop="url" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>

                                </div>
                            </div>

                            <div class="relate_product_page">
                                <h3>{{trans('frontend.relate_product')}}</h3>
                                <div class="row">
                                    @foreach($relatedProduct as $d)
                                    <div class="col-lg-4">
                                        <div class="item_product_re">
                                            <a href="{{route('frontend::product.detail.get',$d->slug)}}">
                                                <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                                alt="{{$d->name}}" >
                                                <h4>{{$d->name}}</h4>
                                            </a>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="sidebar-wrp remove-ext7">
                                <div class="sidebar_popular">
                                <div class="wdgt-bx">
                                    <h4 itemprop="headline">sản phẩm mới cập nhật</h4>
                                    @foreach($popular as $d)
                                    <div class="list_polular">
                                        <div class="img_p_product">
                                            <a href="{{route('frontend::product.detail.get',$d->slug)}}">
                                                <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                                     alt="{{$d->name}}">
                                            </a>
                                        </div>
                                        <div class="desc_p_product">
                                            <p><a href="{{route('frontend::product.detail.get',$d->slug)}}">{{$d->name}}</a></p>
                                        </div>
                                    </div>
                                        @endforeach

                                </div>
                                </div>

                                <div class="sidebar_popular">
                                    <h4 itemprop="headline">Danh mục sản phẩm</h4>
                                    <ul>
                                        @foreach($categorySingle as $d)
                                        <li><a href="{{route('frontend::product.index.get',$d->slug)}}">{{$d->name}}</a></li>
                                            @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
