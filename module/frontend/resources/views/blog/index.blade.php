@extends('frontend::master')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Blogs</h2>
                <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{$data->name}}</p>
            </div>
        </div>
    </div>


    <section class="padd-top-30">
        <div class="container">
            <h2>{{$data->name}}</h2>
            <div class="row">

                <div class="col-lg-12">
                    <div class="content_product">{!! $data->content !!}</div>
                </div>

            </div>



        </div>
    </section>

    @include('frontend::blocks.newsletter')

@endsection
