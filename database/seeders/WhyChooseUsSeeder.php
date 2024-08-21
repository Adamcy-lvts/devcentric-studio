<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhyChooseUs::create([
            'title' => 'Why Choose Us',
            'description' => 'At Devcentric, we specialize in crafting unique solutions designed to boost your organization\'s productivity and foster growth.',
            'items' => json_encode([
                'TAILORED SOLUTIONS: Customized to meet your organization\'s specific needs.',
                'CLOUD-POWERED: Deployed on cutting-edge cloud infrastructure for maximum flexibility and scalability.',
                'ACCESSIBLE: Secure access for all users from anywhere, on any device.',
                'INTEGRATED: Seamless interoperability between different systems and existing tools.',
                'USER-FRIENDLY: Intuitive interfaces for diverse user groups.',
                'SCALABLE: Grows with your organization and adapts to changing landscapes.',
                'SECURE: Robust data protection to safeguard sensitive information.',
                'COST-EFFECTIVE: Optimized to improve efficiency and reduce operational costs.',
            ]),
        ]);
    }
}
