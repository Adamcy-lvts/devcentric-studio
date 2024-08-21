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
        Schema::create('our_missions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->json('mission_points');
            $table->string('ceo_name');
            $table->string('ceo_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_missions');
    }
};
