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
        
        Schema::create('laban_process', function (Blueprint $table) {
            $fields = [
                'qty',
                'water',
                'on_fire',
                'off_fire',
                'cooled_down',
                'laban_added',
                'laban_added_qty',
                'ready',
                'test',
                'notes'
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

        Schema::create('laban_process_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('laban_process')->onDelete('cascade');
            $fields = [
                'bulk_qty',
                'glass_qty',
                'bucket_1_qty',
                'bucket_2_qty',
                'bucket_5_qty',
                'put_in_fridge',
                'final_qty'
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
        Schema::dropIfExists('laban_process');
        Schema::dropIfExists('laban_process_2');
    }
};