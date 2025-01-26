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
        Schema::create('tomme', function (Blueprint $table) {
            $fields = [
                'qty',
                'on_fire',
                'off_fire',
                'cool_down',
                'temperature_1',
                'ferment_added',
                'temperature_2',
                'ferment_qty',
                'pressured',
                'breaking',
                'off_of_fire'
            ];

            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');
            for ($i=1; $i <= 7; $i++) { 
                foreach ($fields as $key => $value) {
                    $table->string($value.'_'.$i)->nullable();
                }
            }       
            $table->timestamps();
        });

        Schema::create('tomme_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('tomme')->onDelete('cascade');
            $fields = [
                'temperature',
                'duration',
                'put_in_mold',
                'date',
                'time',
                'water_salt',
                'duration_in_water',
                'notes'
            ];
            for ($i=1; $i <= 7; $i++) { 
                foreach ($fields as $key => $value) {
                    if ($value == 'date') {
                        $table->date($value.'_'.$i)->nullable();
                    } else
                        $table->string($value.'_'.$i)->nullable();
                }  
            }
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tomme');
        Schema::dropIfExists('tomme_2');
    }
};