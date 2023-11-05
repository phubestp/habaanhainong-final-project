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
        Schema::create('animals', function (Blueprint $table) {
            $table->uuid('animal_id')->primary();
            $table->string('name');
            $table->string('sex');
            $table->string('breed');
            $table->string('animal_type');
            $table->timestamps();
        });

        Schema::table('animals', function (Blueprint $table) {
            $table->foreign('animal_type')->references('Type')->on('animal_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
