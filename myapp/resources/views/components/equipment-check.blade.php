@props(['id_equipment' => 0, 'id_vehicule_equipment' => 0, 'equipment_name' => 'Not Found'])

@php
    $icon = false;
    $class = 'bg-gray-500/20';

    if ($id_equipment === $id_vehicule_equipment) {
        $icon = "ri-check-double-line";
        $class = 'bg-[#5937E0]';
    }
@endphp

<div class="flex items-center gap-2">
    <div class="rounded-full flex justify-center items-center h-6 w-6 {{ $class }}">
        @if ($icon)
            <i class="{{ $icon }} text-white"></i>
        @endif
    </div>
    <p class="font-thin">{{ $equipment_name }}</p>
</div>