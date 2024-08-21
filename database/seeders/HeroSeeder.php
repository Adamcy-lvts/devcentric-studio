<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'description' => 'We craft cutting-edge software solutions for various industries, revolutionizing operations and driving growth.',
            'cta_text' => 'Start Your Project',
            'cta_link' => '#',
            'image' => 'img/bg-hero-2.jpg',
            'headlines' => [
                [
                    'line1' => 'Innovate. Build.',
                    'line2' => 'Transform',
                    'line3' => 'Your Digital Future',
                ],
                [
                    'line1' => 'Disrupt. Optimize.',
                    'line2' => 'Grow',
                    'line3' => 'Your Business Potential',
                ],
                [
                    'line1' => 'Envision. Create.',
                    'line2' => 'Succeed',
                    'line3' => 'In the Digital Era',
                ],
            ],
        ]);
    }
}
