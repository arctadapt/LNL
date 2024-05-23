@props(['active'])

@php
    $classes = $active ?? false ? 'menu-item active open' : 'menu-item';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
