@props(['main_name' => 'Not Found', 'icon' => 'ri-error-warning-line', 'filters' => false])

@php
    $error =
        'flex justify-center items-center py-4 min-w-40 bg-red-500/50 rounded-full hover:bg-red-500/70 transition-all ease-in-out duration-500';
    $class =
        'flex justify-center items-center py-4 min-w-40 bg-gray-500/20 rounded-full hover:bg-gray-500/30 transition-all ease-in-out duration-500';
    $checkbox = ' peer-checked:bg-[#5937E0] peer-checked:hover:shadow-lg peer-checked:text-white';
@endphp

<div class="flex flex-wrap justify-center gap-4">
    <input type="radio" name="{{ $main_name }}" id="all_{{ $main_name }}" class="hidden peer" checked>
    <label for="all_{{ $main_name }}" class="{{ $class . $checkbox }}">All {{ $main_name }}</label>

    @if ($filters)
        @foreach ($filters as $filter)
            <div>
                <input type="radio" name="{{ $main_name }}" id="{{ $filter->name }}" class="hidden peer">
                <label for="{{ $filter->name }}" class="{{ $class . $checkbox }}">
                    <i class="{{ $icon }} mr-2"></i> {{ ucfirst($filter->name) }}
                </label>
            </div>
        @endforeach
    @else
        <div class="{{ $error }}">
            <p class="text-red-900"><i class="{{ $icon }}"></i> Not Found</p>
        </div>
    @endif
</div>
