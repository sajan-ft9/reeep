<!-- backend/layout.blade.php -->

<!-- Access $menus variable -->
@foreach($menus as $menu)
    <li>{{ $menu->name }}</li>
@endforeach
<br>
<!-- Access $submenus variable -->
@foreach($submenus as $submenu)
    <li>{{ $submenu->name }}</li>
@endforeach
