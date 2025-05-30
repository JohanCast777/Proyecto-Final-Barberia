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
        Schema::create('scores', function (Blueprint $table) {
            $table->id('score_id');
            $table->unsignedBigInteger('appointment_id')->unique();
            $table->tinyInteger('rating');
            $table->text('comment')->nullable();
            $table->timestamp('rated_at')->useCurrent();
            $table->foreign('appointment_id')->references('appointment_id')->on('appointments');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
