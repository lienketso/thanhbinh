<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}</title>
    <meta name="description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}" />
    <link rel="canonical" href="{{domain_url()}}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}" />
    <meta property="og:description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}" />
    <meta property="og:url" content="{{(isset($meta_url)) ? $meta_url : domain_url()}}" />
    <meta property="og:image" content="{{(isset($meta_thumbnail)) ? $meta_thumbnail : $setting['site_logo']}}" />
    <meta property="og:site_name" content="Liên Kết Số" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fix.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/colors/color.css')}}" title="color" />

</head>
<body itemscope="">

<main>

@include('frontend::header')

@yield('content')
<!-- ================= footer start ========================= -->
@include('frontend::footer')

</main>

<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/downCount.js')}}"></script>
<script src="{{asset('frontend/assets/js/counterup.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/styleswitcher.js')}}"></script>
<script src="{{asset('frontend/assets/js/fancybox.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom-scripts.js')}}"></script>

@yield("js")
@yield("js-init")
@stack("js")
@stack("js-init")

</body>
</html>



