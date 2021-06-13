@extends('frontend::master')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>{{trans('frontend.get_in_touch')}}</h2>
                <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{trans('frontend.contact')}}</p>
            </div>
        </div>
    </div>

    <section class="padd-top-80 padd-bot-70">
        <div class="container">
            <div class="col-md-6 col-sm-6">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list_alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" class="mrg-bot-40">
                        {{csrf_field()}}
                        <div class="col-md-6 col-sm-6">
                            <label>{{trans('frontend.name')}} (*) :</label>
                            <input type="text" class="form-control" name="name" placeholder="{{trans('frontend.name')}}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>{{trans('frontend.email')}} (*):</label>
                            <input type="email" class="form-control" name="email" placeholder="{{trans('frontend.email')}}">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label>{{trans('frontend.subject')}}:</label>
                            <input type="text" class="form-control" name="title" placeholder="{{trans('frontend.subject')}}">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label>{{trans('frontend.message')}}:</label>
                            <textarea class="form-control height-120" name="messenger" placeholder="{{trans('frontend.message')}}"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button class="btn theme-btn" name="submit">{{trans('frontend.send_message')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.566512514854!2d76.8192921147794!3d30.702470481647698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fecca1d6c0001%3A0xe4953728a502a8e2!2sChandigarh!5e0!3m2!1sen!2sin!4v1520136168627" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
@endsection
