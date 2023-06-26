<ul>
    @php
        $remainingItems = collect();
    @endphp

    @foreach ($menuItems as $index => $menuItem)
        @if ($index < 4)
            <li class="dropdown">
                <a href="/{{ $menuItem->slug }}">
                    <span>{{ $menuItem->name }}</span>
                    @if ($menuItem->children && count($menuItem->children) > 0)
                        <i class="bi bi-chevron-down"></i>
                    @endif
                </a>
                @if ($menuItem->children && count($menuItem->children) > 0)
                    @include('partials.submenu', ['menuItems' => $menuItem->children])
                @endif
            </li>
        @else
            @php
                $remainingItems->push($menuItem);
            @endphp
        @endif
    @endforeach

    @if ($remainingItems->isNotEmpty())
        <li class="dropdown">
            <a href="#">
                <span>More</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="submenu">
                @foreach ($remainingItems as $menuItem)
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
        </li>
    @endif
</ul>
