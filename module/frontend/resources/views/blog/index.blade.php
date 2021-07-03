@extends('frontend::master')
@section('content')
    <section>
        <div class="gap black-layer opc8 overlap144">
            <div class="fixed-bg2" style="background-image: url({{upload_url($data->thumbnail)}});"></div>
            <div class="container">
                <div class="pg-tp-wrp">
                    <h1 itemprop="headline">{{$data->name}}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend::home')}}" title="" itemprop="url">{{trans('frontend.home')}}</a></li>
                        <li class="breadcrumb-item active">{{$data->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap">
            <div class="container">
                <div class="blg-sec remove-ext5">
                    <div class="row">
                        @foreach($post as $d)
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="blg-bx">
                                <div class="blg-thmb blg_news">
                                    <a href="{{route('frontend::blog.detail.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">
                                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                             alt="{{$d->name}}" itemprop="image">
                                    </a>
                                </div>
                                <div class="blg-inf-fix">
                                    <h4 itemprop="headline"><a href="{{route('frontend::blog.detail.get',$d->slug)}}"
                                                               title="{{$d->name}}" itemprop="url">{{cut_string($d->name,70)}}</a>
                                    </h4>
                                    <ul class="pst-mta-date">
                                        <li><i class="far fa-calendar-alt"></i>{{stringDate($d->created_at)}}</li>
                                        <li><i class="fas fa-user"></i> {{trans('frontend.count_view')}} : {{$d->count_view}}</li>
                                    </ul>
                                    <p itemprop="description">{{cut_string($d->description,80)}}</p>
                                    <a href="{{route('frontend::blog.detail.get',$d->slug)}}" title="{{$d->name}}" itemprop="url">{{trans('frontend.read_more')}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                <div class="pgn-wrp text-center">
                    {{$post->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection
