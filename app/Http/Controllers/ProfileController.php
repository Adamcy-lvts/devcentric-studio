<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        
        $profile = Profile::first();

        return view('profile-section', [
            'profile' => $profile
        ]);
    }
}
