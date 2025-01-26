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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->float('price_per_gram')->default(0);
            $table->float('price_per_kilogram')->default(0);

            $table->string('superdealer_barcode')->nullable();
            $table->string('priceperkilogram_barcode')->nullable();

            $table->string('superdealer_sku')->nullable();
            // $table->string('wholesale_sku')->nullable();
            $table->string('priceperkilogram_sku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('price_per_gram');
            $table->dropColumn('price_per_kilogram');
            $table->dropColumn('superdealer_barcode');
            $table->dropColumn('priceperkilogram_barcode');
            $table->dropColumn('superdealer_sku');
            $table->dropColumn('wholesale_sku');
            $table->dropColumn('priceperkilogram_sku');
        });
    }
};