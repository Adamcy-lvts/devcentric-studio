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
