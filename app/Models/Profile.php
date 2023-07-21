<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title','about_me','user_id', 'facebook', 'instagram','twitter','linkedin', 'whatsapp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills() {
          return $this->hasMany(Skill::class);
    }
}
