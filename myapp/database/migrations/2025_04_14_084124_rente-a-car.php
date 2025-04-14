<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Table Type de véhicule
        Schema::create('vehicule_type', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
        });

        // Table Véhicule
        Schema::create('vehicule', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 100);
            $table->string('model', 100);
            $table->integer('year');
            $table->decimal('price_per_day', 10, 2);
            $table->integer('doors')->nullable();
            $table->enum('fuel_type', ['essence', 'diesel', 'électrique', 'hybride']);
            $table->boolean('air_conditioning')->default(false);
            $table->integer('seats')->nullable();
            $table->enum('transmission', ['automatique', 'manuelle']);
            $table->foreignId('vehicule_type_id')->nullable()->constrained('vehicule_type')->onDelete('set null');
        });

        // Table Photo des véhicules
        Schema::create('vehicule_photo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained('vehicule')->onDelete('cascade');
            $table->string('image_url', 255);
            $table->integer('display_order')->default(0);
            $table->timestamps(0); // Utilise les timestamps par défaut
        });

        // Table Disponibilité des véhicules
        Schema::create('vehicule_availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained('vehicule')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_available')->default(true);
        });

        // Table Réservation
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('email', 255);
            $table->foreignId('vehicule_id')->constrained('vehicule')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps(0); // Utilise les timestamps par défaut
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->decimal('total_price', 10, 2);
        });

        // Table Équipements
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
        });

        // Table Relation véhicule <-> équipement
        Schema::create('vehicule_equipment', function (Blueprint $table) {
            $table->foreignId('vehicule_id')->constrained('vehicule')->onDelete('cascade');
            $table->foreignId('equipment_id')->constrained('equipment')->onDelete('cascade');
            $table->primary(['vehicule_id', 'equipment_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicule_equipment');
        Schema::dropIfExists('equipment');
        Schema::dropIfExists('reservation');
        Schema::dropIfExists('vehicule_availability');
        Schema::dropIfExists('vehicule_photo');
        Schema::dropIfExists('vehicule');
        Schema::dropIfExists('vehicule_type');
    }
};
