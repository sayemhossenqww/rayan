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
        Schema::create('labneh_process', function (Blueprint $table) {
            $fields = [
                'qty',
                'put_in_bag',
                'date_off_bag',
                'regular_qty',
                'ball_process_qty',
                'final_qty'
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

        Schema::create('labneh_process_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('labneh_process')->onDelete('cascade');
            $fields = [
                'falavour_reg_qty_1',
                'final_qty_1',
                'falavour_reg_qty_2',
                'final_qty_2',
                'falavour_reg_qty_3',
                'final_qty_3',
                'notes'
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
        Schema::dropIfExists('labneh_process');
        Schema::dropIfExists('labneh_process_2');
    }
};