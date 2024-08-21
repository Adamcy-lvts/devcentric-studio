<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Approach;

class ApproachSeeder extends Seeder
{
    public function run()
    {
        Approach::create([
            'title' => 'Our Approach',
            'description' => 'At DevCentric Solutions, we follow a comprehensive, client-centric approach to ensure the success of every project across all industries and sectors. Here\'s how we bring your vision to life:',
            'steps' => json_encode([
                [
                    'title' => 'Comprehensive Assessment',
                    'description' => 'We analyze your organization\'s unique challenges and objectives to lay a solid foundation for the project.'
                ],
                [
                    'title' => 'Custom Solution Design',
                    'description' => 'Our team creates tailored solutions to address your specific needs, ensuring a perfect fit for your business requirements.'
                ],
                [
                    'title' => 'Collaborative Development',
                    'description' => 'We involve your key stakeholders throughout the process to ensure alignment with your vision and industry-specific needs.'
                ],
                [
                    'title' => 'Secure Deployment',
                    'description' => 'We ensure seamless setup on state-of-the-art infrastructure, whether cloud-based or on-premises, for optimal performance and security.'
                ],
                [
                    'title' => 'Implementation & Training',
                    'description' => 'We provide smooth deployment with thorough staff training to ensure adoption and efficiency across your organization.'
                ],
                [
                    'title' => 'Ongoing Support',
                    'description' => 'We offer continuous assistance to ensure optimal performance and adaptation to your evolving business needs.'
                ],
            ])
        ]);
    }
}
