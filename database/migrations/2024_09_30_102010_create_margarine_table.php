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
        Schema::create('margarine', function (Blueprint $table) {
            $fields = [
                'qty',
                'put_on_fire',
                'butter_qty',
                'jar_qty_1',
                'jar_qty_2',
                'notes'
            ];

            $table->uuid('id')->primary();
            $table->string('year');
            $table->string('week');
            for ($i=1; $i <= 7; $i++) { 
                foreach ($fields as $key => $value) {
                    $table->string($value.'_'.$i)->nullable();
                }
            }       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('margarine');
    }
};