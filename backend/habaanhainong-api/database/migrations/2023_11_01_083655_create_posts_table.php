<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Animal;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //$table->string('author');
            $table->string('title');
            $table->string('description');
            $table->string('address');

            $table->string('user_username');
            $table->foreign('user_username')->references('username')->on('users');

            $table->uuid('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
