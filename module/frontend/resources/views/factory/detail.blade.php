@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{($setting['banner_factory']!='') ? upload_url($setting['banner_factory']) : public_url('frontend/assets/images/tech.png')}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{trans('frontend.factory_information')}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="Trang chủ" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('frontend::factory.index.get')}}"
                                                       title="{{trans('frontend.factory_information')}}"
                                                       itemprop="url">{{trans('frontend.factory_information')}}</a></li>
                        <li class="breadcrumb-item active">{{$data->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap">
            <div class="container">
                <div class="about_factory">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img_factory_detail">
                                <img src="<?= upload_url($data->image) ?>" alt="<?= $data->name; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info_factory">
                                <h4>{{$data->name}}</h4>
                                <div class="desc_fact">
                                    {{$data->description}}
                                </div>
                                <div class="content_fact">
                                    {!! $data->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_factory">
                    <div class="title_main_fac">
                        <h4>Sản phẩm</h4>
                        <p>Danh sách sản phẩm được sản xuất tại <span>{{$data->name}}</span></p>
                    </div>
                    <div class="list_product_fact">
                        <div class="row">

                            <div class="col-lg-3">
                                <div class="item_product_fac">
                                    <a href="#">
                                        <img src="<?= public_url('frontend/assets/images/services-1.jpg') ?>" alt="">
                                        <div class="desc_pro_fact">
                                        <h3>Website Scanning</h3>
                                            <div class="none_hover" >
                                            <p>Lorem ipsum dolor sit amet, con sectetur adipiscing elit sed do.</p>
                                            <span>Xem Thêm <i class="fa fa-arrow-right"></i></span>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="item_product_fac">
                                    <a href="#">
                                        <img src="<?= public_url('frontend/assets/images/services-1.jpg') ?>" alt="">
                                        <div class="desc_pro_fact">
                                            <h3>Website Scanning</h3>
                                            <div class="none_hover" >
                                                <p>Lorem ipsum dolor sit amet, con sectetur adipiscing elit sed do.</p>
                                                <span>Xem Thêm <i class="fa fa-arrow-right"></i></span>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="item_product_fac">
                                    <a href="#">
                                        <img src="<?= public_url('frontend/assets/images/services-1.jpg') ?>" alt="">
                                        <div class="desc_pro_fact">
                                            <h3>Website Scanning</h3>
                                            <div class="none_hover" >
                                                <p>Lorem ipsum dolor sit amet, con sectetur adipiscing elit sed do.</p>
                                                <span>Xem Thêm <i class="fa fa-arrow-right"></i></span>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="item_product_fac">
                                    <a href="#">
                                        <img src="<?= public_url('frontend/assets/images/services-1.jpg') ?>" alt="">
                                        <div class="desc_pro_fact">
                                            <h3>Website Scanning</h3>
                                            <div class="none_hover" >
                                                <p>Lorem ipsum dolor sit amet, con sectetur adipiscing elit sed do.</p>
                                                <span>Xem Thêm <i class="fa fa-arrow-right"></i></span>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
