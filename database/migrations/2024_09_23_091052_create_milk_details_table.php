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
        Schema::create('milk_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('staffs_id')->constrained()->onDelete('cascade');
            $table->string('year');
            $table->string('week');

            $table->string('1_qty_1')->nullable();
            $table->string('1_qty_2')->nullable();
            $table->string('1_qty_3')->nullable();
            $table->string('1_qty_4')->nullable();
            $table->string('1_qty_5')->nullable();
            $table->string('1_qty_6')->nullable();
            $table->string('1_qty_7')->nullable();

            $table->string('1_temperature_1')->nullable();
            $table->string('1_temperature_2')->nullable();
            $table->string('1_temperature_3')->nullable();
            $table->string('1_temperature_4')->nullable();
            $table->string('1_temperature_5')->nullable();
            $table->string('1_temperature_6')->nullable();
            $table->string('1_temperature_7')->nullable();

            $table->string('1_water_1')->nullable();
            $table->string('1_water_2')->nullable();
            $table->string('1_water_3')->nullable();
            $table->string('1_water_4')->nullable();
            $table->string('1_water_5')->nullable();
            $table->string('1_water_6')->nullable();
            $table->string('1_water_7')->nullable();

            $table->string('2_qty_1')->nullable();
            $table->string('2_qty_2')->nullable();
            $table->string('2_qty_3')->nullable();
            $table->string('2_qty_4')->nullable();
            $table->string('2_qty_5')->nullable();
            $table->string('2_qty_6')->nullable();
            $table->string('2_qty_7')->nullable();

            $table->string('2_temperature_1')->nullable();
            $table->string('2_temperature_2')->nullable();
            $table->string('2_temperature_3')->nullable();
            $table->string('2_temperature_4')->nullable();
            $table->string('2_temperature_5')->nullable();
            $table->string('2_temperature_6')->nullable();
            $table->string('2_temperature_7')->nullable();

            $table->string('2_water_1')->nullable();
            $table->string('2_water_2')->nullable();
            $table->string('2_water_3')->nullable();
            $table->string('2_water_4')->nullable();
            $table->string('2_water_5')->nullable();
            $table->string('2_water_6')->nullable();
            $table->string('2_water_7')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milk_details');
    }
};