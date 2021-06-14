@php
    $listRoute = [
        'wadmin::setting.index.get', 'wadmin::setting.fact.get'
    ];
    $indexRoute = ['wadmin::setting.index.get'];
    $factRoute = ['wadmin::setting.fact.get'];
@endphp


<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-gears"></i> <span>Cấu hình</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.index.get')}}">Cấu hình chung</a></li>
        <li class="{{in_array(Route::currentRouteName(), $factRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.fact.get')}}">Thông số</a></li>
    </ul>
</li>

