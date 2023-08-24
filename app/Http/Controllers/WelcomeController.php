<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function profile() {
        
        $profile = Profile::first();
        $posts = Post::where('is_visible', 1)->latest()->take(3)->get();

        return view('welcome', [
            'profile' => $profile,
            'posts' => $posts
        ]);
    }
}
