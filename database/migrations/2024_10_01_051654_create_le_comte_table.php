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
        Schema::create('le_comte', function (Blueprint $table) {
            $fields = [
                'qty',
                'on_fire',
                'off_fire',
                'cool_down',
                'ferment_added',
                'ferment_added_qty',
                'pressured',
                'cut'
            ];

            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');
            for ($i=1; $i <= 7; $i++) { 
                foreach ($fields as $key => $value) {
                    if ($value == 'date_off_bag') {
                        $table->date($value.'_'.$i)->nullable();
                    } else
                        $table->string($value.'_'.$i)->nullable();
                }
            }       
            $table->timestamps();
        });

        Schema::create('le_comte_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('le_comte')->onDelete('cascade');
            $fields = [
                'on_fire',
                'temperature',
                'put_in_mold',
                'water_vs_salt',
                'final_qty',
                'of_comte',
                'of_comtesse'
            ];
            for ($i=1; $i <= 7; $i++) { 
                foreach ($fields as $key => $value) {
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
        Schema::dropIfExists('le_comte');
        Schema::dropIfExists('le_comte_2');
    }
};