{{-- <ul>
    @foreach ($result as $menu)
        <li class="dropdown">
            <a href="{{ $menu->slug }}">
                <span>{{ $menu->name }}</span>
                @if (count($menu['children']) > 0)
                    <i class="bi bi-chevron-down"></i>
                @endif
            </a>
            @if (count($menu['children']) > 0)
                <ul>
                    @foreach ($menu['children'] as $submenu)
                        <li class="dropdown">
                            <a href="{{ $submenu->slug }}">
                                <span>{{ $submenu->name }}</span>
                                @if (count($submenu['children']) > 0)
                                    <i class="bi bi-chevron-right"></i>
                                @endif
                            </a>
                            <ul>
                                @foreach ($submenu['children'] as $subsubmenu)
                                    <li class="dropdown"><a href="{{ $subsubmenu->name }}">{{ $subsubmenu->name }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach

</ul> --}}
@include('partials.submenu', ['menuItems' => $result])

<i class="bi bi-list mobile-nav-toggle"></i>


<!-- End Header -->
