<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() == 0) {
            User::create([
               'name'          => 'Adamcy',
               'email'             => 'lv4mj1@gmail.com',
               'profile_photo_path'=> 'img/ceo_image.jpg',
               'password'          => Hash::make('@Midnight22'),
               'remember_token'    => Str::random(60),

            ]);
        }
    }
}
