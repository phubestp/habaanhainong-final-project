<?php

use App\Models\Enums\ApplicantStatus;
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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->uuid('post');

            $table->foreign('user')->references('username')->on('users');
            $table->foreign('post')->references('id')->on('posts');

            $table->string('reason');
            $table->string('status')->default(ApplicantStatus::WAITING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
