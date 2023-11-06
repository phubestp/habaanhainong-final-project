<?php

use App\Models\Enums\AnimalSex;
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
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('sex')->default(AnimalSex::UNKNOWN);
            $table->string('breed')->nullable();
            $table->integer('age')->nullable();
            $table->unsignedBigInteger('animal_type_id');
            $table->timestamps();
        });

        Schema::table('animals', function (Blueprint $table) {
            $table->foreign('animal_type_id')->references('id')->on('animal_types')->onDelete('cascade');
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
