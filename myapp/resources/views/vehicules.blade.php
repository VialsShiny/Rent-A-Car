<x-app-layout :title="$title">
    <div id="filter" class="flex flex-col gap-8 py-8">
        <x-filter-button main_name="vehicules" icon="ri-car-line" :filters="$vehicule_type" />
        <x-filter-button main_name="energy type" icon="ri-gas-station-line" :filters="$fuel_type" />
        <x-filter-button main_name="type of gear" icon="ri-draggable" :filters="$transmission" />
    </div>
    <div id="vehicules__container" class="flex flex-wrap justify-center gap-4">
      @foreach ($vehicules as $vehicule)
          <x-car-card 
              id="{{ $vehicule->id }}" 
              image="{{ strtolower($vehicule->brand) }}" 
              image_alt="Image of {{ $vehicule->brand }}" 
              name="{{ $vehicule->brand }}" 
              model="{{ $vehicule->model }}" 
              price="{{ $vehicule->price_per_day }}" 
              type="{{ $vehicule->vehiculeType->name }}" 
              transmission="{{ $vehicule->transmission }}" 
              fuel="{{ $vehicule->fuel_type }}" 
              air_conditioning="{{ $vehicule->air_conditioning }}" 
          />
      @endforeach
    </div>
</x-app-layout>