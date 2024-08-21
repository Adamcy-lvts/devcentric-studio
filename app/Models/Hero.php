<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'cta_text',
        'cta_link',
        'image',
        'headlines',
    ];

    protected $casts = [
        'headlines' => 'array',
    ];
}
