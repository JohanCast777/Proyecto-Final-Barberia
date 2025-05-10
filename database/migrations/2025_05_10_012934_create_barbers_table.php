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
        Schema::create('barbers', function (Blueprint $table) {
            $table->unsignedBigInteger('barber_id')->primary();
            $table->unsignedBigInteger('user_id')->unique();
            $table->text('bio')->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->decimal('average_rating', 3, 2)->default(0);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        }); // <-- Aquí se cierra correctamente el bloque Schema::create
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbers');
    }
};