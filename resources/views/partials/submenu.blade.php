<ul>
    @foreach ($menuItems as $menuItem)
        <li class="dropdown">
            <a href="{{ $menuItem->slug }}">
                <span>{{ $menuItem->name }}</span>
                @if ($menuItem->children && count($menuItem->children) > 0)
                    <i class="bi bi-chevron-down"></i>
                @endif
            </a>
            @if ($menuItem->children && count($menuItem->children) > 0)
                @include('partials.submenu', ['menuItems' => $menuItem->children])
            @endif
        </li>
    @endforeach
</ul>
