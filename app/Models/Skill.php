<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rating', 'svg_code', 'bg_color', 'profile_id'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
