@props(['type' => 'primary', 'href' => null])

@php
    $classes = 'btn ';
    if ($type === 'primary') $classes .= 'btn-primary';
    if ($type === 'danger') $classes .= 'btn-danger';
    if ($type === 'secondary') $classes .= 'btn-secondary'; // Need to define this in CSS
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes, 'type' => 'submit']) }}>
        {{ $slot }}
    </button>
@endif
