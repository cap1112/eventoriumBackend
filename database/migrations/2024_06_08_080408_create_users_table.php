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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image');
            $table->enum('profile', ['Admin', 'Profesor', 'Estudiante'])->default('estudiante');
            $table->integer('sleep_hours');
            $table->enum('diseases', ['Diabetes', 'Hipertension', 'Obesidad', 'Asma', 'Artritis', 'Ninguna'])->default('Ninguna');
            $table->enum('physical_activity', ['Sedentario', 'Moderado', 'Activo'])->default('Moderado');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};