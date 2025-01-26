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
        Schema::create('coffee_bags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('product_type');
            $table->integer('bbag_num')->default(1);
            $table->integer('jar_num')->default(1);
            $table->float('total_amount')->default(90);
            $table->integer('bigcon_num')->default(180);
            $table->integer('smallcon_num')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_bags');
    }
};
