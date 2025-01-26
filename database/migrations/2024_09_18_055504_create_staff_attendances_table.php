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
        Schema::create('staff_attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('staffs_id')->constrained()->onDelete('cascade');
            $table->string('year');
            $table->string('month');

            $table->time('in_1')->nullable();
            $table->time('in_2')->nullable();
            $table->time('in_3')->nullable();
            $table->time('in_4')->nullable();
            $table->time('in_5')->nullable();
            $table->time('in_6')->nullable();
            $table->time('in_7')->nullable();
            $table->time('in_8')->nullable();
            $table->time('in_9')->nullable();
            $table->time('in_10')->nullable();
            $table->time('in_11')->nullable();
            $table->time('in_12')->nullable();
            $table->time('in_13')->nullable();
            $table->time('in_14')->nullable();
            $table->time('in_15')->nullable();
            $table->time('in_16')->nullable();
            $table->time('in_17')->nullable();
            $table->time('in_18')->nullable();
            $table->time('in_19')->nullable();
            $table->time('in_20')->nullable();
            $table->time('in_21')->nullable();
            $table->time('in_22')->nullable();
            $table->time('in_23')->nullable();
            $table->time('in_24')->nullable();
            $table->time('in_25')->nullable();
            $table->time('in_26')->nullable();
            $table->time('in_27')->nullable();
            $table->time('in_28')->nullable();
            $table->time('in_29')->nullable();
            $table->time('in_30')->nullable();
            $table->time('in_31')->nullable();

            $table->time('out_1')->nullable();
            $table->time('out_2')->nullable();
            $table->time('out_3')->nullable();
            $table->time('out_4')->nullable();
            $table->time('out_5')->nullable();
            $table->time('out_6')->nullable();
            $table->time('out_7')->nullable();
            $table->time('out_8')->nullable();
            $table->time('out_9')->nullable();
            $table->time('out_10')->nullable();
            $table->time('out_11')->nullable();
            $table->time('out_12')->nullable();
            $table->time('out_13')->nullable();
            $table->time('out_14')->nullable();
            $table->time('out_15')->nullable();
            $table->time('out_16')->nullable();
            $table->time('out_17')->nullable();
            $table->time('out_18')->nullable();
            $table->time('out_19')->nullable();
            $table->time('out_20')->nullable();
            $table->time('out_21')->nullable();
            $table->time('out_22')->nullable();
            $table->time('out_23')->nullable();
            $table->time('out_24')->nullable();
            $table->time('out_25')->nullable();
            $table->time('out_26')->nullable();
            $table->time('out_27')->nullable();
            $table->time('out_28')->nullable();
            $table->time('out_29')->nullable();
            $table->time('out_30')->nullable();
            $table->time('out_31')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_attendances');
    }
};