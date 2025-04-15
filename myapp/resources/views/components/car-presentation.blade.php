@props(['name' => 'Not Found', 'price_per_day' => 'E', 'car_image' => 'undefined.png', 'images' => false])

<div class="flex flex-col gap-6">
    <h2 class="text-4xl font-bold">{{ $name }}</h2>
    <div class="flex gap-2">
        <strong class="text-[#5937E0] text-2xl">${{ $price_per_day }}</strong>
        <p class="font-thin text-sm mt-1">/ day</p>
    </div>
    <img src="{{ asset('img/img-card') . "/$car_image" }}" alt="tkt" class="blur-sm w-full">
    <div class="w-full flex gap-6">
        @if (!$images)
            <p class="w-full flex justify-center font-thin">No much images found for this car.</p>
        @endif
    </div>
</div>
