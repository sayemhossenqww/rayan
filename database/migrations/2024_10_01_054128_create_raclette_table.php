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
        Schema::create('raclette', function (Blueprint $table) {
            $fields = [
                'qty',
                'on_fire',
                'off_fire',
                'temperature_1',
                'temperature_2',
                'cool_down',
                'ferment_added',
                'pressured',
                'breaking',
                'stirring_until',
                'serum_extracted'
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

        Schema::create('raclette_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('raclette')->onDelete('cascade');
            $fields = [
                'serum_qty',
                'water',
                'fire_on',
                'put_in_mold',
                'stirring1',
                'stirring2',
                'stirring3',
                'date',
                'water_vs_salt',
                'notes',
                'final_qty'
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
        Schema::dropIfExists('raclette');
        Schema::dropIfExists('raclette_2');
    }
};