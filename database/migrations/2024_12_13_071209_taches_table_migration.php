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
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('nom')->nullable()->index();
            $table->string('description', 45)->nullable();
            $table->enum('status', ["a faire", "en cours", "terminé"])->default("a faire");
            $table->timestamp('startDate')->nullable();
            $table->timestamp('endDate')->nullable();
            $table->foreignId('project_id')->constrained("projects");
            $table->foreignId('user_id')->constrained("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
