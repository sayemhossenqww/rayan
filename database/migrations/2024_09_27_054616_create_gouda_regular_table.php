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
        Schema::create('gouda_regular_1', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');
            for ($i=1; $i <= 7; $i++) { 
                $table->string('qty_'.$i)->nullable();
                $table->string('time_on_'.$i)->nullable();
                $table->string('time_off_'.$i)->nullable();
                $table->string('cooled_down_'.$i)->nullable();
                $table->string('ferment_added_'.$i)->nullable();
                $table->string('ferment_added_qty_'.$i)->nullable();
                $table->string('pressured_'.$i)->nullable();
                $table->string('temperature_'.$i)->nullable();
                $table->string('fire_cut_'.$i)->nullable();
                $table->string('water_temperature_'.$i)->nullable();
                $table->string('serum_removed_'.$i)->nullable();
            }       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gouda_regular_1');
    }
};