@php
    $indent = str_repeat('&emsp;', $depth);
@endphp

<option value="{{ $item->id }}" {{ $item->id == $parent_id ? 'selected' : '' }}>
    {!! $indent !!}
    {{ $item->name }}

</option>

@if (!empty($item['children']))
    @foreach ($item['children'] as $child)
        @include('partials.option', ['item' => $child, 'depth' => $depth + 1])
    @endforeach
@endif