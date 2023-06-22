@extends('layout')
@section('content')
    <section class="inner-page">
        <ul>
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
                                            <li><a href="{{ $subsubmenu->name }}">{{ $subsubmenu->name }}</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

        </ul>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            </button>
            <ul class="dropdown-menu">
                @foreach ($result as $menu)
                    <li class="dropdown-item">
                        <a href="{{ $menu['slug'] }}">{{ $menu['name'] }}</a>
                        @if (count($menu['children']) > 0)
                            <ul class="dropdown-menu">
                                @foreach ($menu['children'] as $submenu)
                                    <li class="dropdown-item">
                                        <a href="{{ $submenu['slug'] }}">{{ $submenu['name'] }}</a>
                                        @if (count($submenu['children']) > 0)
                                            <ul class="dropdown-menu">
                                                @foreach ($submenu['children'] as $subsubmenu)
                                                    <li class="dropdown-item">
                                                        <a href="{{ $subsubmenu['slug'] }}">{{ $subsubmenu['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
