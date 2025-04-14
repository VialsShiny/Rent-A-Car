@props([
    'id' => 0,
    'image' => '...',
    'image_alt' => 'Description Not found',
    'name' => 'Undefined',
    'price' => 'E',
    'type' => 'Not Found',
    'transmission' => 'Not Found',
    'fuel' => 'None',
    'air_conditioning' => 'Not found'
])

<div class="flex flex-col gap-6 p-6 w-1/3 bg-gray-500/20 rounded-xl">
    <img src="{{ $image }}" alt="{{ $image_alt }}">
    <div class="w-full">
        <div class="flex justify-between">
            <strong class="text-md">{{ ucfirst($name) }}</strong>
            <em class="text-indigo-500 font-bold text-md not-italic">${{ $price }}</em>
        </div>
        <div class="flex justify-between">
            <em class="text-sm">{{ $type }}</em>
            <p class="text-sm">per day</p>
        </div>
    </div>
    <div class="w-full grid grid-cols-3 gap-2">
        <div class="flex items-center gap-1">
            <i class="ri-draggable text-xl"></i>
            <em class="font-thin text-sm not-italic">{{ $transmission }}</em>
        </div>

               <div class="flex items-center gap-1">
            <i class="ri-gas-station-fill text-xl"></i>
            <em class="font-thin text-sm not-italic">{{ $fuel }}</em>
        </div>
        <div class="flex items-center gap-1">
            <i class="ri-snowflake-fill text-xl"></i>
            <em class="font-thin text-sm not-italic">{{ $air_conditioning }}</em>
        </div>
    </div>
    <a href="/" class="focus:outline-none text-white text-center bg-[#5937E0] hover:brightness-75 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition-all ease-in-out duration-300">Purple</a>
</div>