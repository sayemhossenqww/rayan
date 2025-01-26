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
        Schema::create('gouda_regular_2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->references('id')->on('gouda_regular_1')->onDelete('cascade');
            $table->string('year');
            $table->string('week');

            for ($i=1; $i <= 7; $i++) { 
                $table->string('put_in_water_'.$i)->nullable();
                $table->string('in_mold_'.$i)->nullable();
                $table->date('date_'.$i)->nullable();
                $table->string('water_'.$i)->nullable();
                $table->string('salt_'.$i)->nullable();
                $table->string('lancienne_qty_'.$i)->nullable();
                $table->string('reqular_qty_'.$i)->nullable();
            }
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gouda_regular_2');
    }
};