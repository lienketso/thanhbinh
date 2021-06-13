@php
    $listRoute = [
        'wadmin::setting.index.get'
    ];

@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="{{route('wadmin::setting.index.get')}}"><i class="fa fa-gears"></i> <span>Cấu hình</span></a></li>
