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
        Schema::create('bans', function (Blueprint $table) {
            $table->string('banned_user')->primary();
            $table->uuid('from_report')->nullable();
            $table->string('by_user')->nullable();
            $table->string('ban_reason')->nullable();
            $table->timestamps();
        });
        Schema::table('bans', function (Blueprint $table) {
            $table->foreign('banned_user')->references('username')->on('users');
            $table->foreign('from_report')->references('id')->on('reports');
            $table->foreign('by_user')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bans');
    }
};
