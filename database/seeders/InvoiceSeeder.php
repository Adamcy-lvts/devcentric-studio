<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate tables first to avoid duplicate records
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('invoice_items')->truncate();
        DB::table('invoices')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->command->info('Invoice tables truncated successfully.');

        // Sample Invoice 1: Website Development and Google Workspace
        $invoice1 = new Invoice([
            'client_name' => 'Chad Basin Development Authority',
            'client_email' => 'info@chadbasin.gov.ng',
            'client_phone' => '0801234567',
            'client_address' => 'Chad Basin HQ, Maiduguri, Borno State',
            'date' => now(),
            'due_date' => now()->addDays(30),
            'subtotal' => 4516162.0,
            'discount' => 0,
            'tax_rate' => 0,
            'tax_amount' => 0,
            'total_amount' => 4516162.0,
            'deposit' => 1753240.0,
            'balance_due' => 2762922.0,
            'payment_method' => 'bank_transfer',
            'payment_terms' => 30,
            'status' => 'partially_paid',
            'notes' => 'Payment due within 30 days of invoice date.',
            'payment_instructions' => 'Please include invoice number in payment reference.',
            'bank_name' => 'Access Bank',
            'account_name' => 'Devcentric Studio Ltd.',
            'account_number' => '0123456789',
        ]);
        
        // This will trigger the generateInvoiceNumber method in the model
        $invoice1->generateInvoiceNumber();
        $invoice1->save();
        
        // Create invoice items for Invoice 1
        InvoiceItem::create([
            'invoice_id' => $invoice1->id,
            'name' => 'Website Development',
            'description' => 'Corporate website with CMS and custom design',
            'quantity' => 1,
            'unit_price' => 3500000.0,
        ]);
        
        InvoiceItem::create([
            'invoice_id' => $invoice1->id,
            'name' => 'Google Workspace Setup',
            'description' => 'Setup and configuration of Google Workspace for 30 staff members',
            'quantity' => 1,
            'unit_price' => 850000.0,
        ]);
        
        InvoiceItem::create([
            'invoice_id' => $invoice1->id,
            'name' => 'Staff Training',
            'description' => 'On-site training for content management and email system',
            'quantity' => 2,
            'unit_price' => 83081.0,
        ]);
        
        // Sample Invoice 2: Healthcare System with Tax
        $invoice2 = new Invoice([
            'client_name' => 'General Hospital Wuse',
            'client_email' => 'admin@ghwuse.gov.ng',
            'client_phone' => '0809876543',
            'client_address' => 'Plot 123, Wuse Zone 5, Abuja',
            'date' => now()->subDays(15),
            'due_date' => now()->addDays(15),
            'subtotal' => 5000000.0,
            'discount' => 250000.0,
            'tax_rate' => 7.5,
            'tax_amount' => 356250.0,
            'total_amount' => 5106250.0,
            'deposit' => 2553125.0,
            'balance_due' => 2553125.0,
            'payment_method' => 'bank_transfer',
            'payment_terms' => 30,
            'status' => 'partially_paid',
            'notes' => 'Implementation to commence upon receipt of 50% deposit.',
            'bank_name' => 'Access Bank',
            'account_name' => 'Devcentric Studio Ltd.',
            'account_number' => '0123456789',
        ]);
        
        // This will trigger the generateInvoiceNumber method in the model
        $invoice2->generateInvoiceNumber();
        $invoice2->save();
        
        // Create invoice items for Invoice 2
        InvoiceItem::create([
            'invoice_id' => $invoice2->id,
            'name' => 'Hospital Management System',
            'description' => 'Complete hospital management system with patient records, billing, and inventory',
            'quantity' => 1,
            'unit_price' => 3800000.0,
        ]);
        
        InvoiceItem::create([
            'invoice_id' => $invoice2->id,
            'name' => 'Customization',
            'description' => 'Custom modules for radiology and laboratory integration',
            'quantity' => 1,
            'unit_price' => 750000.0,
        ]);
        
        InvoiceItem::create([
            'invoice_id' => $invoice2->id,
            'name' => 'Staff Training Sessions',
            'description' => 'Training for different departments',
            'quantity' => 3,
            'unit_price' => 150000.0,
        ]);
    }
}
