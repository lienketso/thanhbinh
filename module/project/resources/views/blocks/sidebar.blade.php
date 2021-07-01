@php
    $listRoute = [
        'wadmin::project.index.get', 'wadmin::project.create.get', 'wadmin::project.edit.get'
    ];

@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="{{route('wadmin::project.index.get',['post_type'=>'project'])}}"><i class="fa fa-rocket"></i> <span>Giải pháp</span></a></li>
