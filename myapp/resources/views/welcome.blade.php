<x-app-layout :title="$title">
    <x-book-car>
        <div class="relative z-5 flex flex-col gap-y-8 w-4/6">
            <h2 class="text-white text-5xl font-bold">Experience the road like never before</h2>
            <p class="text-white">Rent a car in just a few taps. Fast, flexible, and affordable, your next ride is
                always
                ready, wherever and
                whenever you need it.</p>
            <a href="/vehicules"
                class="max-w-32 text-white bg-[#FF9E0C] hover:brightness-75 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center me-2 mb-2 transition-all ease-in-out duration-300">
                View all cars
            </a>
        </div>
        <div class="relative w-3/6 z-5 flex flex-col gap-y-6 p-6 bg-white rounded-2xl">
            <strong class="text-2xl text-center">Book your car</strong>
            <form action="/vehicules" method="post">
                @csrf
                <div class="space-y-5">
                    <x-select name="vehicule_type">
                        <option value="">Vehicule type</option>
                        @foreach ($vehicule_type as $ele)
                            <option value="{{ $ele->name }}">{{ ucfirst($ele->name) }}</option>
                        @endforeach
                    </x-select>
                    <x-select name="fuel_type">
                        <option value="">Energy type</option>
                        @foreach ($fuel_type as $ele)
                            <option value="{{ $ele->fuel_type }}">{{ ucfirst($ele->fuel_type) }}</option>
                        @endforeach
                    </x-select>
                    <x-select name="transmission">
                        <option value="">Type of Gear</option>
                        @foreach ($transmission as $ele)
                            <option value="{{ $ele->transmission }}">{{ ucfirst($ele->transmission) }}</option>
                        @endforeach
                    </x-select>
                </div>
                <input type="submit" value="Book now"
                    class="w-full mt-12 text-white bg-[#FF9E0C] hover:brightness-75 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center transition-all ease-in-out duration-300">
            </form>
        </div>
    </x-book-car>

    <div class="w-full grid grid-cols-3 gap-x-16 py-12">
        <div class="flex flex-col items-center">
            <i class="ri-pin-distance-line text-6xl"></i>
            <strong class="text-2xl">Available</strong>
            <p class="mt-6 text-center">
                A wide range of vehicles, available anytime, wherever you need them.
            </p>
        </div>
        <div class="flex flex-col items-center">
            <i class="ri-car-line text-6xl"></i>
            <strong class="text-2xl">Comfort</strong>
            <p class="mt-6 text-center">
                Enjoy a smooth, relaxing drive with clean, modern, well-equipped cars.
            </p>
        </div>
        <div class="flex flex-col items-center">
            <i class="ri-wallet-line text-6xl"></i>
            <strong class="text-2xl">Savings</strong>
            <p class="mt-6 text-center">
                Smart prices, no hidden fees — only pay when you actually drive.
            </p>
        </div>
    </div>

    <div class="flex flex-col gap-y-8 py-12">
        <div class="flex justify-between">
            <h3 class="text-3xl font-bold">Choose the car that suits you</h3>
            <a href="/vehicules" class="font-bold text-lg hover:pr-3 transition-all ease-in-out duration-500">View All
                <i class="ri-arrow-right-long-line"></i></a>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($vehicules as $vehicule)
                <x-car-card id="{{ $vehicule->id }}" image="{{ $vehicule->vehiculeImage[0]->image_url }}"
                    name="{{ $vehicule->brand }}" model="{{ $vehicule->model }}" price="{{ $vehicule->price_per_day }}"
                    type="{{ $vehicule->vehiculeType->name }}" transmission="{{ $vehicule->transmission }}"
                    fuel="{{ $vehicule->fuel_type }}" air_conditioning="{{ $vehicule->air_conditioning }}" />
            @endforeach
        </div>
    </div>
</x-app-layout>
