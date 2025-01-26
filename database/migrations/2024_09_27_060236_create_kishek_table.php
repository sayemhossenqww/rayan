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
        Schema::create('kishek', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');
            $table->timestamps();
        });
        
        for ($i=1; $i <= 7; $i++) { 
            Schema::create('kishek_'.$i, function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->foreignUuid('parent_id')->references('id')->on('kishek')->onDelete('cascade');
                $table->string('year');
                $table->string('week');
                $table->string('laban_qty')->nullable();
                $table->string('groats')->nullable();
                $table->string('salt')->nullable();
                $table->string('current_weight')->nullable();
                $table->date('breaking_date')->nullable();
                $table->string('cost_of_breaking')->nullable();
                for ($i=1; $i <= 9; $i++) { 
                    $table->date('labneh_added_'.$i)->nullable();
                    $table->string('labneh_amount_'.$i)->nullable();
                    $table->string('current_weight_'.$i)->nullable();
                }
                $table->string('final_qty')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kishek');
        for ($i=1; $i <= 7; $i++) { 
            Schema::dropIfExists('kishek_'.$i);
        }
    }
};