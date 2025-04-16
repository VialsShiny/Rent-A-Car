@foreach($vehicules as $vehicule)
    <x-car-card 
        :id="$vehicule->id"
        :image="strtolower($vehicule->brand)"
        :imageAlt="'Image of ' . $vehicule->brand"
        :name="$vehicule->brand"
        :model="$vehicule->model"
        :price="$vehicule->price_per_day"
        :type="$vehicule->vehiculeType->name ?? ''"
        :transmission="$vehicule->transmission"
        :fuel="$vehicule->fuel_type"
        :airConditioning="$vehicule->air_conditioning"
    />
@endforeach
