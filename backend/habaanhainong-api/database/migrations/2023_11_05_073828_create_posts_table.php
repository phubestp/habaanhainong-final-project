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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('post_id')->primary();
            $table->string('author');
            $table->string('title');
            $table->string('description');
            $table->timestamp('created_at');
            $table->string('address');
            $table->uuid('animal_id');
//            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('author')->references('username')->on('users');
            $table->foreign('animal_id')->references('animal_id')->on('animals')->onDelete('cascade');
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
