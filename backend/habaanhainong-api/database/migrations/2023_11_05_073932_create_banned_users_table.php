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
        Schema::create('banned_users', function (Blueprint $table) {
            $table->string('banned_user');
            $table->uuid('from_report')->nullable();
            $table->string('by_user');
            $table->string('ban_reason');
            $table->dateTime('ban_at');
            $table->timestamps();
        });
        Schema::table('banned_users', function (Blueprint $table) {
            $table->foreign('banned_user')->references('username')->on('users');
            $table->foreign('from_report')->references('report_id')->on('reports');
            $table->foreign('by_user')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banned_users');
    }
};
