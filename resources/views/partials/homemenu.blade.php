<ul>
    @foreach ($menus as $menu)
        <li class="dropdown">
            <a href="{{ $menu->slug }}"><span>{{ $menu->name }} </span>
                @foreach ($submenus as $submenu)
                    @if ($menu->id == $submenu->parent_id)
                        <i class="bi bi-chevron-down"></i>
                    @break
                @endif
            @endforeach
        </a>
        <ul>
            @foreach ($submenus as $submenu)
                @if ($menu->id == $submenu->parent_id)
                    <li><a href="{{ $menu->slug }}/{{ $submenu->slug }}">{{ $submenu->name }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
@endforeach

</ul>
<i class="bi bi-list mobile-nav-toggle"></i>


<!-- End Header -->
