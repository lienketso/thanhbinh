@php
    $listRoute = [
        'wadmin::gallery.index.get', 'wadmin::gallery.create.get', 'wadmin::gallery.edit.get','wadmin::group.index.get','wadmin::group.create.get','wadmin::group.edit.get'
    ];
@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="{{route('wadmin::group.index.get')}}"><i class="fa fa-camera-retro"></i> <span>Thư viện ảnh</span></a>
</li>
