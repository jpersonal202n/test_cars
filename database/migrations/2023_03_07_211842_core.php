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

        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->string('type',10); //camioneta,auto
            $table->string('brand',20);
            $table->string('model',20);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('locations',function(Blueprint $table){
            $table->id();
            $table->uuid();

            $table->string('name',15);
            $table->string('municipality',20);
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('locations_cars', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('location_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
        Schema::dropIfExists('locations_cars');
        Schema::dropIfExists('cars');
    }
};
