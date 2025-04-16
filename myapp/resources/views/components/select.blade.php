@props(['name' => 'undefined'])

<select name="{{ $name }}" id="vehicule-type" class="w-full border-none rounded-2xl bg-gray-300/50 focus:ring-2 focus:ring-black">
    {{ $slot }}
</select>   