<ul>
    @foreach($childs as $child)
    <li>
        <a href="{{ $child->link }}" title="{{ $child->name }}" itemprop="url">{{ $child->name }}</a>
        @if(count($child->childs))
            @include('frontend::blocks.submenu',['childs' => $child->childs])
        @endif
    </li>
    @endforeach
</ul>
