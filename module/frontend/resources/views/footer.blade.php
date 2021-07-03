<footer>
    <div class="gap footer_bca" style="background-image: url('{{public_url('frontend/assets/images/footer-bg.jpg')}}')">
        <div class="container">
            <div class="ftr-dta remove-ext5">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-lg-3">

                        <div class="wdgt-bx">
                            <h5 itemprop="headline">{{trans('frontend.quick_link')}}</h5>
                            <ul>
                                @foreach($catNewsFoot as $d)
                                <li><a href="{{route('frontend::blog.index.get',$d->slug)}}" title="{{$d->name}}" itemprop="url"><i class="fas fa-angle-double-right"></i>{{$d->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-12 col-lg-3">

                        <div class="wdgt-bx">
                            <h5 itemprop="headline">{{trans('frontend.solution')}}</h5>
                            <ul>
                                @foreach($catFoot as $d)
                                <li><a href="{{route('frontend::product.index.get',$d->slug)}}" title="{{$d->name}}" itemprop="url"><i class="fas fa-angle-double-right"></i>{{$d->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="thongtin_cty wdgt-bx">
                            <h5 itemprop="headline">{{trans('frontend.contact')}}</h5>
                            <p>Website : www.thanhbinh-bca.vn</p>
                            <p>{{trans('frontend.address')}} : {{$setting['site_address_'.$lang]}}</p>
                            <p>{{trans('frontend.phone')}} : {{$setting['site_hotline_'.$lang]}} - Email : {{$setting['site_email_'.$lang]}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-lg-3">

                        <div class="wdgt-bx">
                            <h5 itemprop="headline">{{$setting['keyword_7_'.$lang]}}</h5>
                            <div class="info_footer">
                                {!! $setting['site_footer_info_1_'.$lang] !!}
                            </div>
{{--                            <div class="btn_profile">--}}
{{--                                <a href="{{upload_url($setting['site_profile'])}}" target="_blank"><i class="fas fa-download"></i> {{trans('frontend.download_profile')}}</a>--}}
{{--                            </div>--}}
{{--                            <div class="btn_contact_foot">--}}
{{--                                <a href="tel:{{$setting['site_hotline_'.$lang]}}"><i class="fas fa-phone"></i> {{trans('frontend.contact_price')}}</a>--}}
{{--                            </div>--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<div class="btm-br drk-bg-fix">
    <div class="container">
        <div class="cpyrgt float-left"><p itemprop="description"><a href="#" title="" itemprop="url">Thanhbinh-bca</a> &copy; 2021 / ALL RIGHTS RESERVED</p></div>
        <div class="scl-sbcrb float-right">

            <div class="scl3">
                <a href="{{$setting['site_twitter']}}" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="{{$setting['site_facebook']}}" title="Facebook" itemprop="url" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{{$setting['site_instagram']}}" title="Instagram" itemprop="url" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
