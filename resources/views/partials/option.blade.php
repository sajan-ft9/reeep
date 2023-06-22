
@php
    $indent = str_repeat('&emsp;&emsp;', $depth);
@endphp

<option style="font-size: {{ $item['font-size'] }}" value="{{ $item['id'] }}">
    {!! $indent !!}
    {!! $item['bullet'] !!}
   &triangleright; {{ $item['name'] }}
</option>

@if (!empty($item['children']))
    @foreach ($item['children'] as $child)
        @include('partials.option', ['item' => $child, 'depth' => $depth + 1])
    @endforeach
@endif
