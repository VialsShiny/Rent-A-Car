<x-app-layout :title="$title">
    <div class="grid grid-cols-2 gap-12">
        <x-car-presentation name="{{ $vehicule->brand }}" price_per_day="{{ $vehicule->price_per_day }}" car_image="{{ $car_image }}"/>
            <div class="flex flex-col gap-8">
            <strong class="text-2xl">Technical Specification</strong>
            <div class="flex flex-wrap gap-6">
                <x-specification-container icon="ri-draggable" title="Gear Box" info="{{ $vehicule->transmission }}" />
                <x-specification-container icon="ri-gas-station-fill" title="Energy Type"
                    info="{{ $vehicule->fuel_type }}" />
                <x-specification-container icon="ri-car-washing-line" title="Type"
                    info="{{ $vehicule->vehiculeType->name }}" />
                <x-specification-container icon="ri-door-open-line" title="Doors" info="{{ $vehicule->doors }}" />
                <x-specification-container icon="ri-snowflake-fill" title="Air Conditionner"
                    info="{{ $vehicule->air_conditioning }}" />
                <x-specification-container icon="ri-user-6-line" title="Seats" info="{{ $vehicule->seats }}" />
            </div>
            <a href="/vehicule/{{ $vehicule->id }}/reservation"
                class="focus:outline-none text-white text-center bg-[#5937E0] hover:brightness-75 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 mt-6 max-w-56 transition-all ease-in-out duration-300">
                Rent a Car
            </a>
            <div class="mt-4 flex flex-col gap-8">
                <strong class="text-2xl">Car Equipments</strong>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($equipments as $equipment)
                        @php
                            // Vérifie si l'équipement est associé au véhicule
                            $isAssociated = $vehicule->equipments->contains($equipment->id);
                        @endphp

                        <x-equipment-check id_equipment="{{ $equipment->id }}"
                            id_vehicule_equipment="{{ $isAssociated ? $vehicule->equipments->where('id', $equipment->id)->first()->id : null }}"
                            equipment_name="{{ $equipment->name }}" :checked="$isAssociated" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-y-8 py-12 mt-24">
        <div class="flex justify-between items-center">
            <h3 class="text-3xl font-bold">Others cars</h3>
            <a href="/vehicules" class="font-bold text-lg hover:pr-3 transition-all ease-in-out duration-500">View All
                <i class="ri-arrow-right-long-line"></i></a>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($vehicules as $vehicule)
                <x-car-card id="{{ $vehicule->id }}" image="{{ strtolower($vehicule->brand) }}"
                    image_alt="Image of {{ $vehicule->brand }}" name="{{ $vehicule->brand }}" model="{{ $vehicule->model }}"
                    price="{{ $vehicule->price_per_day }}" type="{{ $vehicule->vehiculeType->name }}"
                    transmission="{{ $vehicule->transmission }}" fuel="{{ $vehicule->fuel_type }}"
                    air_conditioning="{{ $vehicule->air_conditioning }}" />
            @endforeach
        </div>
    </div>
</x-app-layout>
