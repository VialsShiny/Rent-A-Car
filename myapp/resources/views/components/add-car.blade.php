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
    <div class="relative z-5 flex flex-col gap-y-8 w-4/6">
        <h2 class="text-white text-5xl font-bold">Experience the road like never before</h2>
        <p class="text-white">Rent a car in just a few taps. Fast, flexible, and affordable, your next ride is always
            ready, wherever and
            whenever you need it.</p>
        <button type="button"
            class="max-w-32 text-white bg-[#FF9E0C] hover:brightness-75 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center me-2 mb-2 transition-all ease-in-out duration-300">
            View all cars
        </button>
    </div>
    <div class="relative w-3/6 z-5 flex flex-col gap-y-6 p-6 bg-white rounded-2xl">
        <strong class="text-2xl text-center">Book your car</strong>
        <form action="/vehicules" method="post">
            <div class="space-y-5">
                <x-select>
                    <option value="">Vehicule type</option>
                </x-select>
                <x-select>
                    <option value="">Energy type</option>
                </x-select>
                <x-select>
                    <option value="">Type of Gear</option>
                </x-select>
            </div>
            <input type="submit" value="Book now"
                class="w-full mt-12 text-white bg-[#FF9E0C] hover:brightness-75 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center transition-all ease-in-out duration-300">
        </form>
    </div>
</div>