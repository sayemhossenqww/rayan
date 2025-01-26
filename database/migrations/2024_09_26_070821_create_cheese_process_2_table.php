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
        Schema::create('cheese_process_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('cheese_process_1')->onDelete('cascade');
            $table->string('year');
            $table->string('week');

            $table->string('put_in_mold_1')->nullable();
            $table->string('put_in_mold_2')->nullable();
            $table->string('put_in_mold_3')->nullable();
            $table->string('put_in_mold_4')->nullable();
            $table->string('put_in_mold_5')->nullable();
            $table->string('put_in_mold_6')->nullable();
            $table->string('put_in_mold_7')->nullable();

            $table->string('boiling_started_1_1')->nullable();
            $table->string('boiling_started_1_2')->nullable();
            $table->string('boiling_started_1_3')->nullable();
            $table->string('boiling_started_1_4')->nullable();
            $table->string('boiling_started_1_5')->nullable();
            $table->string('boiling_started_1_6')->nullable();
            $table->string('boiling_started_1_7')->nullable();

            $table->string('boiling_started_2_1')->nullable();
            $table->string('boiling_started_2_2')->nullable();
            $table->string('boiling_started_2_3')->nullable();
            $table->string('boiling_started_2_4')->nullable();
            $table->string('boiling_started_2_5')->nullable();
            $table->string('boiling_started_2_6')->nullable();
            $table->string('boiling_started_2_7')->nullable();

            $table->string('halloum_cheese_qty_1')->nullable();
            $table->string('halloum_cheese_qty_2')->nullable();
            $table->string('halloum_cheese_qty_3')->nullable();
            $table->string('halloum_cheese_qty_4')->nullable();
            $table->string('halloum_cheese_qty_5')->nullable();
            $table->string('halloum_cheese_qty_6')->nullable();
            $table->string('halloum_cheese_qty_7')->nullable();

            $table->string('in_fridge_1')->nullable();
            $table->string('in_fridge_2')->nullable();
            $table->string('in_fridge_3')->nullable();
            $table->string('in_fridge_4')->nullable();
            $table->string('in_fridge_5')->nullable();
            $table->string('in_fridge_6')->nullable();
            $table->string('in_fridge_7')->nullable();

            $table->string('akkwai_cheese_qty_1')->nullable();
            $table->string('akkwai_cheese_qty_2')->nullable();
            $table->string('akkwai_cheese_qty_3')->nullable();
            $table->string('akkwai_cheese_qty_4')->nullable();
            $table->string('akkwai_cheese_qty_5')->nullable();
            $table->string('akkwai_cheese_qty_6')->nullable();
            $table->string('akkwai_cheese_qty_7')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheese_process_2');
    }
};