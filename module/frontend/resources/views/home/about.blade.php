@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url('{{public_url('frontend/assets/images/page-bg.png')}}');"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">Về chúng tôi</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item active">Về chúng tôi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="cybersecurity-area ptb-100">
        <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cybersecurity-img">
                        <img src="{{public_url('frontend/assets/images/cybersecurity-img.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cybersecurity-content">
                        <h2>24/7 Cybersecurity Operation Center</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.</p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <ul class="cybersecurity-item">
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Managed Web Application
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        SIEM Threat Detection
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Content Delivery Network
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Website Hack Repair
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <ul class="cybersecurity-item">
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Instant Malware Removal
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Instant Malware Removal
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Instant Malware Removal
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        Instant Malware Removal
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <section class="electronic-area bg-color ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="electronic-content">
                        <h2>Innovative Electronic Protection of Your Office and Home Control Online</h2>
                        <div class="electronic-tab-wrap">
                            <div class="tab electronic-tab">
                                <ul class="tabs active">
                                    <li class="current">
                                        <a href="#">
                                            Intercom System
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            CCTV
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            GDPR
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            Encryption
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            Our Goal
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab_content">
                                    <div class="tabs_item" style="">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, vero corporis voluptates beatae pariatur laudantium, fugiat illum ab deserunt nostrum aliquid quisquam esse? Voluptatibus quia velit numquam esse porro ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, corporis.</p>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi quasi cumque placeat fuga. Ea, eius?</p>
                                    </div>
                                    <div class="tabs_item" style="display: none;">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, vero corporis voluptates beatae pariatur laudantium, fugiat illum ab deserunt nostrum aliquid quisquam esse? Voluptatibus quia velit numquam esse porro ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, corporis.</p>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi quasi cumque placeat fuga. Ea, eius?</p>
                                    </div>
                                    <div class="tabs_item" style="display: none;">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, vero corporis voluptates beatae pariatur laudantium, fugiat illum ab deserunt nostrum aliquid quisquam esse? Voluptatibus quia velit numquam esse porro ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, corporis.</p>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi quasi cumque placeat fuga. Ea, eius?</p>
                                    </div>
                                    <div class="tabs_item" style="display: none;">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, vero corporis voluptates beatae pariatur laudantium, fugiat illum ab deserunt nostrum aliquid quisquam esse? Voluptatibus quia velit numquam esse porro ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, corporis.</p>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi quasi cumque placeat fuga. Ea, eius?</p>
                                    </div>
                                    <div class="tabs_item" style="display: none;">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, vero corporis voluptates beatae pariatur laudantium, fugiat illum ab deserunt nostrum aliquid quisquam esse? Voluptatibus quia velit numquam esse porro ipsum dolor, sit amet consectetur adipisicing elit. Illo ducimus vero, corporis.</p>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi quasi cumque placeat fuga. Ea, eius?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="electronic-img">
                        <img src="{{public_url('frontend/assets/images/electronic-img.png')}}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="complete-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="complete-img">
                        <img src="{{public_url('frontend/assets/images/complete-img.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="complete-content">
                        <h2>The most Complete and Effective Protection for Your Home and Office</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor elit incididunt ut labore et dolore magna aliqua. Quis ipsum</p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-security">
                                    <i class="fa fa-lock"></i>
                                    <h3>Check and Search Hazards</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-security">
                                    <i class="fa fa-lock"></i>
                                    <h3>Install and Configure Software</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-security mb-0 mb-rs-need">
                                    <i class="fa fa-lock"></i>
                                    <h3>Departure of the Our Experts</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-security mb-0">
                                    <i class="fa fa-lock"></i>
                                    <h3>24/7 Support and Remote Admit</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



    @endsection
