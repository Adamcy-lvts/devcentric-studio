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
        Schema::create('industry_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('industry');
            $table->text('description');
            $table->string('benefits');
            $table->text('icon');
            $table->string('sample_image');
            $table->json('features');
            $table->json('key_benefits');
            $table->json('our_offerings');
            $table->text('why_choose_us');
            $table->text('call_to_action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry_solutions');
    }
};
