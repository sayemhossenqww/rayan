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
        Schema::create('nuts_industry_mixers', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_nuts')->nullable(); // Type of Mouneh
            $table->string('quantity_of_pistachio')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_regular_cashew')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_smoked_cashew')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_hazelnut')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_regular_almond')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_smoked_almond')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_white_seed')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            $table->string('quantity_of_freekeh_almond')->nullable(); // Quantity of fruit/vegetable (1lbs, 1kg, 1pc)
            //$table->string('quantity_of_sugar_salt')->nullable(); // Quantity of sugar/salt (1lbs, 1kg, 1pc)
            //$table->string('quantity_of_acid')->nullable(); // Quantity of acid (1lbs, 1kg, 1pc)
           // $table->boolean('glass_used')->nullable(); // Glass used (boolean)
            $table->string('final_quantity')->nullable(); // Final quantity (number)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nuts_industry_mixers');
    }
};
