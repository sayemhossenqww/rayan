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
        Schema::create('cheese_process_1', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');

            $table->string('qty_1')->nullable();
            $table->string('qty_2')->nullable();
            $table->string('qty_3')->nullable();
            $table->string('qty_4')->nullable();
            $table->string('qty_5')->nullable();
            $table->string('qty_6')->nullable();
            $table->string('qty_7')->nullable();

            $table->string('milk_analyzer_1')->nullable();
            $table->string('milk_analyzer_2')->nullable();
            $table->string('milk_analyzer_3')->nullable();
            $table->string('milk_analyzer_4')->nullable();
            $table->string('milk_analyzer_5')->nullable();
            $table->string('milk_analyzer_6')->nullable();
            $table->string('milk_analyzer_7')->nullable();

            $table->string('time_on_1')->nullable();
            $table->string('time_on_2')->nullable();
            $table->string('time_on_3')->nullable();
            $table->string('time_on_4')->nullable();
            $table->string('time_on_5')->nullable();
            $table->string('time_on_6')->nullable();
            $table->string('time_on_7')->nullable();

            $table->string('time_off_1')->nullable();
            $table->string('time_off_2')->nullable();
            $table->string('time_off_3')->nullable();
            $table->string('time_off_4')->nullable();
            $table->string('time_off_5')->nullable();
            $table->string('time_off_6')->nullable();
            $table->string('time_off_7')->nullable();

            $table->string('cooled_down_1')->nullable();
            $table->string('cooled_down_2')->nullable();
            $table->string('cooled_down_3')->nullable();
            $table->string('cooled_down_4')->nullable();
            $table->string('cooled_down_5')->nullable();
            $table->string('cooled_down_6')->nullable();
            $table->string('cooled_down_7')->nullable();

            $table->string('rennet_qty_1')->nullable();
            $table->string('rennet_qty_2')->nullable();
            $table->string('rennet_qty_3')->nullable();
            $table->string('rennet_qty_4')->nullable();
            $table->string('rennet_qty_5')->nullable();
            $table->string('rennet_qty_6')->nullable();
            $table->string('rennet_qty_7')->nullable();

            $table->string('added_1')->nullable();
            $table->string('added_2')->nullable();
            $table->string('added_3')->nullable();
            $table->string('added_4')->nullable();
            $table->string('added_5')->nullable();
            $table->string('added_6')->nullable();
            $table->string('added_7')->nullable();

            $table->string('fermented_1')->nullable();
            $table->string('fermented_2')->nullable();
            $table->string('fermented_3')->nullable();
            $table->string('fermented_4')->nullable();
            $table->string('fermented_5')->nullable();
            $table->string('fermented_6')->nullable();
            $table->string('fermented_7')->nullable();

            $table->string('cut_1')->nullable();
            $table->string('cut_2')->nullable();
            $table->string('cut_3')->nullable();
            $table->string('cut_4')->nullable();
            $table->string('cut_5')->nullable();
            $table->string('cut_6')->nullable();
            $table->string('cut_7')->nullable();

            $table->string('balady_cheese_qty_1')->nullable();
            $table->string('balady_cheese_qty_2')->nullable();
            $table->string('balady_cheese_qty_3')->nullable();
            $table->string('balady_cheese_qty_4')->nullable();
            $table->string('balady_cheese_qty_5')->nullable();
            $table->string('balady_cheese_qty_6')->nullable();
            $table->string('balady_cheese_qty_7')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheese_process_1');
    }
};