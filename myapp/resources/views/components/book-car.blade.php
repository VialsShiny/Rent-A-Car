@props(['sens' => null])

@php
    $class = '';
    switch ($sens) {
        case 'left':
            $class = 'left-20';
            break;

        case 'right':
            $class = 'right-20';
            break;

        default:
            $class = 'left-1/3';
            break;
    }
@endphp

<div
    class="relative bg-[#5937E0] flex items-center justify-between gap-x-24 rounded-3xl shadow-md min-h-96 px-20 py-24 backdrop-blur-md overflow-hidden">
    <img src="{{ asset('img/blur-car.png') }}" alt="Blur Car Background"
        class="translate-y-12 absolute -z-1 {{ $class }} blur-md w-1/2">
    {{ $slot }}
</div>