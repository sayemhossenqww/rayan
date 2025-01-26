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
            $table->float('box_price', 12, 2)->default(0);
            $table->float('unit_price', 12, 2)->default(0);

            $table->string('box_barcode')->nullable();
            $table->string('unit_barcode')->nullable();

            $table->string('box_sku')->nullable();
            $table->string('unit_sku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('box_price');
            $table->dropColumn('unit_price');
            $table->dropColumn('box_barcode');
            $table->dropColumn('unit_barcode');
            $table->dropColumn('box_sku');
            $table->dropColumn('unit_sku');
        });
    }
};
