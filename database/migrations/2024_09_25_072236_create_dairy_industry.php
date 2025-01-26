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
        Schema::create('dairy_industry', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');
            $table->date('date')->nullable();

            $table->string('qty_1')->nullable();
            $table->string('qty_2')->nullable();
            $table->string('qty_3')->nullable();
            $table->string('qty_4')->nullable();
            $table->string('qty_5')->nullable();
            $table->string('qty_6')->nullable();
            $table->string('qty_7')->nullable();

            $table->string('time_fire_1')->nullable();
            $table->string('time_fire_2')->nullable();
            $table->string('time_fire_3')->nullable();
            $table->string('time_fire_4')->nullable();
            $table->string('time_fire_5')->nullable();
            $table->string('time_fire_6')->nullable();
            $table->string('time_fire_7')->nullable();

            $table->string('detail_1_1')->nullable();
            $table->string('detail_1_2')->nullable();
            $table->string('detail_1_3')->nullable();
            $table->string('detail_1_4')->nullable();
            $table->string('detail_1_5')->nullable();
            $table->string('detail_1_6')->nullable();
            $table->string('detail_1_7')->nullable();

            $table->string('detail_2_1')->nullable();
            $table->string('detail_2_2')->nullable();
            $table->string('detail_2_3')->nullable();
            $table->string('detail_2_4')->nullable();
            $table->string('detail_2_5')->nullable();
            $table->string('detail_2_6')->nullable();
            $table->string('detail_2_7')->nullable();

            $table->string('cerak_qty_1')->nullable();
            $table->string('cerak_qty_2')->nullable();
            $table->string('cerak_qty_3')->nullable();
            $table->string('cerak_qty_4')->nullable();
            $table->string('cerak_qty_5')->nullable();
            $table->string('cerak_qty_6')->nullable();
            $table->string('cerak_qty_7')->nullable();

            $table->string('cream_qty_1')->nullable();
            $table->string('cream_qty_2')->nullable();
            $table->string('cream_qty_3')->nullable();
            $table->string('cream_qty_4')->nullable();
            $table->string('cream_qty_5')->nullable();
            $table->string('cream_qty_6')->nullable();
            $table->string('cream_qty_7')->nullable();

            $table->string('ricotta_qty_1')->nullable();
            $table->string('ricotta_qty_2')->nullable();
            $table->string('ricotta_qty_3')->nullable();
            $table->string('ricotta_qty_4')->nullable();
            $table->string('ricotta_qty_5')->nullable();
            $table->string('ricotta_qty_6')->nullable();
            $table->string('ricotta_qty_7')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dairy_industry');
    }
};