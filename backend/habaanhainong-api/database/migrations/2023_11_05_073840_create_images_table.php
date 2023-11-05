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
        Schema::create('images', function (Blueprint $table) {
            $table->uuid('image_id')->primary();
            $table->uuid('from_post');
            $table->binary('image_file');
            $table->string('file_extension');
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('from_post')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
