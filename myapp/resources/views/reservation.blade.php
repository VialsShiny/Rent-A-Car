<x-app-layout :title="$title">
    <h1 class="text-5xl font-bold text-center py-12">Reservation</h1>

    <div class="mt-24 grid grid-cols-3 items-center gap-24">
        <x-car-presentation name="{{ $vehicule->brand }}" price_per_day="{{ $vehicule->price_per_day }}"
            car_image="{{ $car_image }}" customClass="col-span-2 gap-4" />
        <form action="#" method="post" class="flex flex-col gap-10">
            <input type="date" name="start_date" id="start_date"
                class="w-full border-none rounded-xl bg-gray-300/30 focus:ring-2 focus:ring-black">
            <input type="date" name="start_date" id="start_date"
                class="w-full border-none rounded-xl bg-gray-300/30 focus:ring-2 focus:ring-black">
            <input type="email" name="email" id="email"
                class="w-full border-none rounded-xl bg-gray-300/30 focus:ring-2 focus:ring-black" placeholder="Email">

            <label for="total_price" class="flex gap-4 items-center font-thin">
                <input type="checkbox" name="total_price" id="total_price"
                    class="rounded-full flex justify-center items-center h-6 w-6">
                Total Price
            </label>

            <input type="submit"
                class="focus:outline-none text-white text-center bg-[#5937E0] hover:brightness-75 font-medium rounded-lg text-sm w-2/3 px-5 py-2.5 mb-2 transition-all ease-in-out duration-300" value="Book Now">
        </form>
    </div>
</x-app-layout>
