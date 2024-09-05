<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'description' => 'We craft cutting-edge software solutions for various industries, revolutionizing operations and driving growth.',
            'cta_text' => 'Explore Solutions',
            'cta_link' => '#industry-solutions-section',
            'image' => 'img/bg-hero-2.jpg',
            'headlines' => [

                [
                    'line1' => 'Electronic Health Records',
                    'line2' => 'Streamlined Patient Care',
                    'line3' => 'Healthcare',
                ],
                [
                    'line1' => 'Student Information System',
                    'line2' => 'Enhanced Academic Management',
                    'line3' => 'Education',
                ],
                [
                    'line1' => 'Hotel Management System',
                    'line2' => 'Optimized Bookings & Operations',
                    'line3' => 'Hospitality',
                ],
                [
                    'line1' => 'Donor Management Software',
                    'line2' => 'Efficient Fundraising & Tracking',
                    'line3' => 'Non-Profit',
                ],
                [
                    'line1' => 'Industrial IoT Platform',
                    'line2' => 'Real-time Monitoring & Control',
                    'line3' => 'Manufacturing',
                ],
                [
                    'line1' => 'Real Estate CRM',
                    'line2' => 'Streamlined Property Management',
                    'line3' => 'Real Estate',
                ],
                [
                    'line1' => 'E-commerce Platform',
                    'line2' => 'Seamless Online Retail',
                    'line3' => 'Retail',
                ],
                [
                    'line1' => 'Financial Management Suite',
                    'line2' => 'Secure Transactions & Analytics',
                    'line3' => 'Finance',
                ],
                [
                    'line1' => 'Logistics Management System',
                    'line2' => 'Optimized Routes & Tracking',
                    'line3' => 'Transportation',
                ],
                [
                    'line1' => 'Cloud Infrastructure',
                    'line2' => 'Scalable & Flexible Computing',
                    'line3' => 'Enterprise IT',
                ],
            ],
        ]);
    }
}
