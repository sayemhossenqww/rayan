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
        Schema::table('nuts_industry_mixers', function (Blueprint $table) {
            // Add product_id as a char(36) field
            $table->char('product_id', 36)->nullable(); // Set to nullable if it's not required initially

            // Add a foreign key constraint (assuming the `products` table has `id` as char(36))
            $table->foreign('product_id')
                ->references('id')  // Reference the `id` field of the `products` table
                ->on('products')
                ->onDelete('set null'); // Set to null when the related product is deleted (adjust as needed)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nuts_industry_mixers', function (Blueprint $table) {
             // Drop the foreign key constraint and the column
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
