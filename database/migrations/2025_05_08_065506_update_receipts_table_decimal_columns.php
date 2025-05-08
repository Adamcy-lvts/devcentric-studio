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
        Schema::table('receipts', function (Blueprint $table) {
            // Modify columns to handle larger monetary values
            $table->decimal('amount', 15, 2)->change();
            $table->decimal('deposit', 15, 2)->nullable()->change();
            $table->decimal('balance_due', 15, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            // Revert columns back to original size
            $table->decimal('amount', 8, 2)->change();
            $table->decimal('deposit', 8, 2)->nullable()->change();
            $table->decimal('balance_due', 8, 2)->nullable()->change();
        });
    }
};
