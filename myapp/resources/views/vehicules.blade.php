<x-app-layout :title="$title">
    <div id="filter" class="flex flex-col gap-8 py-8">
        <x-filter-button main_name="vehicules" icon="ri-car-line" :filters="$vehicule_type" />
        <x-filter-button main_name="energy type" icon="ri-gas-station-line" :filters="$fuel_type" />
        <x-filter-button main_name="type of gear" icon="ri-draggable" :filters="$transmission" />
    </div>
    <div id="vehicules__container" class="flex flex-wrap justify-center gap-4">

    </div>
</x-app-layout>