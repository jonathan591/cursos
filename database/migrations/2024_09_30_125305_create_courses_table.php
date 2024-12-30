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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("descripcion");
            $table->integer("cupos");
            $table->string("image");
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
