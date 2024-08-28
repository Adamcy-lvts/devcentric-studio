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
                    'line1' => 'Cloud Computing:',
                    'line2' => 'Scalable, Flexible,',
                    'line3' => 'Cost-Efficient',
                ],
                [
                    'line1' => 'EHR Systems:',
                    'line2' => 'Streamlined Care,',
                    'line3' => 'Secure Data',
                ],
                [
                    'line1' => 'School Portals:',
                    'line2' => 'Enhanced Communication,',
                    'line3' => 'Resource Access',
                ],
                [
                    'line1' => 'Hotel Bookings:',
                    'line2' => 'Efficient Reservations,',
                    'line3' => 'Higher Occupancy',
                ],
                [
                    'line1' => 'NGO Software:',
                    'line2' => 'Donor Tracking,',
                    'line3' => 'Program Monitoring',
                ],
                [
                    'line1' => 'Industrial IoT:',
                    'line2' => 'Real-time Monitoring,',
                    'line3' => 'Predictive Maintenance',
                ],
                [
                    'line1' => 'Real Estate CRM:',
                    'line2' => 'Lead Management,',
                    'line3' => 'Property Tracking',
                ],
                [
                    'line1' => 'E-commerce Platform:',
                    'line2' => 'Seamless Transactions,',
                    'line3' => 'Inventory Control',
                ],
                [
                    'line1' => 'Fintech Solutions:',
                    'line2' => 'Secure Payments,',
                    'line3' => 'Financial Analytics',
                ],
                [
                    'line1' => 'Logistics Software:',
                    'line2' => 'Route Optimization,',
                    'line3' => 'Shipment Tracking',
                ],
            ],
        ]);
    }
}
