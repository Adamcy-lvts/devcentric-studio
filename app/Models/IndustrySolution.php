<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustrySolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry',
        'description',
        'icon',
        'sample_image',
        'features',
        'key_benefits',
        'our_offerings',
        'why_choose_us',
        'call_to_action',
    ];

    protected $casts = [
        'features' => 'array',
        'key_benefits' => 'array',
        'our_offerings' => 'array',
    ];

    public function getColorClass()
    {
        $colors = [
            'Healthcare' => 'blue',
            'Finance' => 'green',
            'Education' => 'yellow',
            'Real Estate' => 'red',
            'Manufacturing' => 'purple',
            'Retail' => 'indigo',
        ];

        return $colors[$this->industry] ?? 'gray';
    }
}
