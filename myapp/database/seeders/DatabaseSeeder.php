<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 🚗 Vehicle Types
        DB::table('vehicule_type')->insert([
            ['name' => 'sedan'],
            ['name' => 'minivan'],
            ['name' => 'suv'],
            ['name' => 'crossover'],
            ['name' => 'pickup'],
            ['name' => 'cabriolet'],
        ]);

        // 🛠️ Equipment
        DB::table('equipment')->insert([
            ['name' => 'GPS'],
            ['name' => 'Bluetooth'],
            ['name' => 'Sièges chauffants'],
            ['name' => 'Caméra de recul'],
            ['name' => 'Toit ouvrant'],
        ]);

        // 🚙 Vehicles
        DB::table('vehicule')->insert([
            ['brand' => 'Toyota', 'model' => 'Corolla', 'year' => 2021, 'price_per_day' => 40.00, 'doors' => 4, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 1],
            ['brand' => 'Honda', 'model' => 'Odyssey', 'year' => 2022, 'price_per_day' => 65.00, 'doors' => 5, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 7, 'transmission' => 'automatique', 'vehicule_type_id' => 2],
            ['brand' => 'Jeep', 'model' => 'Wrangler', 'year' => 2023, 'price_per_day' => 80.00, 'doors' => 3, 'fuel_type' => 'diesel', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'manuelle', 'vehicule_type_id' => 3],
            ['brand' => 'Mazda', 'model' => 'CX-5', 'year' => 2022, 'price_per_day' => 55.00, 'doors' => 5, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 4],
            ['brand' => 'Ford', 'model' => 'F-150', 'year' => 2021, 'price_per_day' => 75.00, 'doors' => 4, 'fuel_type' => 'diesel', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 5],
            ['brand' => 'BMW', 'model' => '4 Series Cabriolet', 'year' => 2023, 'price_per_day' => 95.00, 'doors' => 2, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 4, 'transmission' => 'automatique', 'vehicule_type_id' => 6],
            ['brand' => 'Hyundai', 'model' => 'Tucson', 'year' => 2022, 'price_per_day' => 50.00, 'doors' => 5, 'fuel_type' => 'hybride', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 4],
            ['brand' => 'Mercedes Benz', 'model' => 'E-Class', 'year' => 2023, 'price_per_day' => 90.00, 'doors' => 4, 'fuel_type' => 'diesel', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 1],
            ['brand' => 'Volkswagen', 'model' => 'Multivan', 'year' => 2021, 'price_per_day' => 70.00, 'doors' => 5, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 7, 'transmission' => 'automatique', 'vehicule_type_id' => 2],
        ]);

        // 📸 Vehicle Photos (1 per vehicle for now)
        DB::table('vehicule_photo')->insert([
            ['vehicule_id' => 1, 'image_url' => 'toyota_corolla.png', 'display_order' => 0],
            ['vehicule_id' => 2, 'image_url' => 'honda_odyssey.png', 'display_order' => 0], 
            ['vehicule_id' => 3, 'image_url' => 'jeep_wrangler.png', 'display_order' => 0],
            ['vehicule_id' => 4, 'image_url' => 'mazda_cx-5.png', 'display_order' => 0],
            ['vehicule_id' => 5, 'image_url' => 'ford_f-150.png', 'display_order' => 0],
            ['vehicule_id' => 6, 'image_url' => 'bmw_4_series_cabriolet.png', 'display_order' => 0],
            ['vehicule_id' => 7, 'image_url' => 'hyundai_tucson.png', 'display_order' => 0],
            ['vehicule_id' => 8, 'image_url' => 'mercedes_benz_eclass.png', 'display_order' => 0],
            ['vehicule_id' => 9, 'image_url' => 'volkswagen_multivan.png', 'display_order' => 0],
        ]);

        // 🔧 Equipments per vehicle (some sample associations)
        DB::table('vehicule_equipment')->insert([
            ['vehicule_id' => 1, 'equipment_id' => 1],
            ['vehicule_id' => 1, 'equipment_id' => 2],
            ['vehicule_id' => 2, 'equipment_id' => 1],
            ['vehicule_id' => 2, 'equipment_id' => 4],
            ['vehicule_id' => 3, 'equipment_id' => 2],
            ['vehicule_id' => 3, 'equipment_id' => 3],
            ['vehicule_id' => 4, 'equipment_id' => 1],
            ['vehicule_id' => 4, 'equipment_id' => 5],
            ['vehicule_id' => 5, 'equipment_id' => 3],
            ['vehicule_id' => 5, 'equipment_id' => 4],
            ['vehicule_id' => 6, 'equipment_id' => 1],
            ['vehicule_id' => 6, 'equipment_id' => 5],
            ['vehicule_id' => 7, 'equipment_id' => 2],
            ['vehicule_id' => 7, 'equipment_id' => 3],
            ['vehicule_id' => 8, 'equipment_id' => 1],
            ['vehicule_id' => 8, 'equipment_id' => 4],
            ['vehicule_id' => 8, 'equipment_id' => 5],
            ['vehicule_id' => 9, 'equipment_id' => 1],
            ['vehicule_id' => 9, 'equipment_id' => 2],
            ['vehicule_id' => 9, 'equipment_id' => 3],
        ]);

        // 📅 Reservations (2 per vehicle)
        DB::table('reservation')->insert([
            ['email' => 'alice@example.com', 'vehicule_id' => 1, 'start_date' => '2025-04-20', 'end_date' => '2025-04-23', 'total_price' => 120.00],
            ['email' => 'bob@example.com', 'vehicule_id' => 1, 'start_date' => '2025-05-10', 'end_date' => '2025-05-13', 'total_price' => 120.00],
            ['email' => 'charlie@example.com', 'vehicule_id' => 2, 'start_date' => '2025-04-25', 'end_date' => '2025-04-30', 'total_price' => 325.00],
            ['email' => 'diane@example.com', 'vehicule_id' => 2, 'start_date' => '2025-06-01', 'end_date' => '2025-06-05', 'total_price' => 260.00],
            ['email' => 'ethan@example.com', 'vehicule_id' => 3, 'start_date' => '2025-05-03', 'end_date' => '2025-05-06', 'total_price' => 240.00],
            ['email' => 'fay@example.com', 'vehicule_id' => 3, 'start_date' => '2025-06-10', 'end_date' => '2025-06-12', 'total_price' => 160.00],
            ['email' => 'george@example.com', 'vehicule_id' => 4, 'start_date' => '2025-04-22', 'end_date' => '2025-04-24', 'total_price' => 110.00],
            ['email' => 'hannah@example.com', 'vehicule_id' => 4, 'start_date' => '2025-05-12', 'end_date' => '2025-05-14', 'total_price' => 110.00],
            ['email' => 'ian@example.com', 'vehicule_id' => 5, 'start_date' => '2025-04-28', 'end_date' => '2025-05-02', 'total_price' => 300.00],
            ['email' => 'julia@example.com', 'vehicule_id' => 5, 'start_date' => '2025-06-03', 'end_date' => '2025-06-07', 'total_price' => 300.00],
            ['email' => 'karl@example.com', 'vehicule_id' => 6, 'start_date' => '2025-05-15', 'end_date' => '2025-05-17', 'total_price' => 190.00],
            ['email' => 'lara@example.com', 'vehicule_id' => 6, 'start_date' => '2025-06-01', 'end_date' => '2025-06-04', 'total_price' => 285.00],
            ['email' => 'matt@example.com', 'vehicule_id' => 7, 'start_date' => '2025-04-18', 'end_date' => '2025-04-21', 'total_price' => 150.00],
            ['email' => 'nina@example.com', 'vehicule_id' => 7, 'start_date' => '2025-05-22', 'end_date' => '2025-05-25', 'total_price' => 150.00],
            ['email' => 'oliver@example.com', 'vehicule_id' => 8, 'start_date' => '2025-04-27', 'end_date' => '2025-04-30', 'total_price' => 270.00],
            ['email' => 'penny@example.com', 'vehicule_id' => 8, 'start_date' => '2025-05-15', 'end_date' => '2025-05-18', 'total_price' => 270.00],
            ['email' => 'quentin@example.com', 'vehicule_id' => 9, 'start_date' => '2025-04-15', 'end_date' => '2025-04-18', 'total_price' => 210.00],
            ['email' => 'rita@example.com', 'vehicule_id' => 9, 'start_date' => '2025-05-20', 'end_date' => '2025-05-23', 'total_price' => 210.00],
        ]);
    }
}
