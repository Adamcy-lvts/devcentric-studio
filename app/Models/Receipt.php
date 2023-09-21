<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    const PAYMENT_METHODS = [
        'cash' => 'Cash',
        'debit_card' => 'Debit Card',
        'bank_transfer' => 'Bank Transfer',
        'pos' => 'POS'
    ];
}
