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
        Schema::table('locations_cars', function (Blueprint $table) {
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations_cars', function (Blueprint $table) {
            $table->dropForeign(['car_id','location_id']);
        });
    }
};
