@php
    $menus = getAllmenu();
@endphp

@if(!empty($menus))
<ul>
    @foreach($menus as $menu)
        @if(count($menu->childs))
    <li class="menu-item-has-children">
        <a class="brd-rd3" href="{{$menu->link}}" title="" itemprop="url">{{$menu->name}} <i class="fas fa-angle-down"></i></a>
        @include('frontend::blocks.submenu',['childs' => $menu->childs])
    </li>
        @else
            <li> <a title="" itemprop="url" href="{{$menu->link}}">{{$menu->name}}</a></li>
        @endif
    @endforeach
</ul>
@endif
