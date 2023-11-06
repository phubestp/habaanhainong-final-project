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
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('reporter');
            $table->string('reported');
            $table->uuid('from_post')->nullable();
            $table->string('report_reason');
            $table->dateTime('report_at');
            $table->timestamps();
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->primary('id');
            $table->foreign('reporter')->references('username')->on('users');
            $table->foreign('reported')->references('username')->on('users');
            $table->foreign('from_post')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
