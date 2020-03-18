@foreach($items as $item)
    <li>
        @if ($item->hasChildren())<button class="show_second_lvl"></button> @endif
        <a href="{{ $item->url() }}" @if ($item->hasChildren())class="first_lvl"@endif>
            <span>{{ $item->title }}</span>
        </a>
        @if ($item->hasChildren())
            <ul class="second_lvl d-flex">
                @include('customMenuItems', ['items' => $item->children()])
            </ul>
        @endif
    </li>
@endforeach