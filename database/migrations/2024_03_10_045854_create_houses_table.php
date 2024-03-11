<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('agent_id');
            $table->string('slug');
            $table->string('name');
            $table->string('city');
            $table->string('image');
            $table->string('location');
            $table->string('additional_image_link')->nullable();
            $table->string('number_of_rooms');
            $table->string('number_of_bedrooms');
            $table->string('number_of_bathrooms');
            $table->string('price_per_month');
            $table->text('description');
            $table->string('area')->nullable();
            $table->string('floor_plan')->nullable();
            $table->string('video')->nullable();
            $table->boolean('borehole_available')->default(false);
            $table->boolean('parking_available')->default(false);
            $table->boolean('internet_connection')->default(false);
            $table->boolean('solar_system')->default(false);
            $table->boolean('swimming_pool')->default(false);
            $table->boolean('availability_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
