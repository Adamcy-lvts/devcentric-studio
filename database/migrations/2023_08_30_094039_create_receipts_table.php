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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number')->unique();  // Receipt number
            $table->string('received_from');     // Name of the person/business who made the payment
            $table->date('date');               // Date of receipt
            $table->decimal('amount', 8, 2);    // Amount paid
            $table->text('payment_for');        // Description of what the payment was for
            $table->decimal('deposit', 8, 2)->nullable();      // Optional deposit amount
            $table->decimal('balance_due', 8, 2)->nullable();  // Optional balance due
            $table->enum('payment_method', ['cash', 'debit_card', 'bank_transfer', 'pos']);
            // Payment method (cash, debit card, bank transfer, POS)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
