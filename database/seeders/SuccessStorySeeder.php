<?php

namespace Database\Seeders;

use App\Models\SuccessStory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'title' => 'Baetmal Enterprise',
                'subtitle' => 'Financial Management Platform',
                'description' => 'Created a tailored financial management platform for Baetmal Enterprise. This system provides real-time insights into total balances, deposits, withdrawals, and profits. It features intuitive dashboards and detailed analytics, empowering data-driven decision-making.',
                'image' => 'img/baetmal_dashboard.png',
            ],
            [
                'title' => 'Sulrah Global Investment',
                'subtitle' => 'Transaction Management System',
                'description' => 'Developed a comprehensive transaction management app for Sulrah Global Investment. As their customer base grew, manual bookkeeping became impractical. This solution streamlines deposit tracking, customer management, and financial reporting, enabling efficient scaling of operations.',
                'image' => 'img/sulrah_dashboard.png',
            ],
            [
                'title' => 'Khalil Integrated Academy',
                'subtitle' => 'Educational Management System',
                'description' => 'Designed and implemented a comprehensive management system for Khalil Integrated Academy. This solution streamlines admissions processes, student records management, and academic administration. It includes features for generating admission letters, managing student data, and facilitating efficient school operations.',
                'image' => 'img/kia_admission.png',
            ],
        ];

        foreach ($stories as $story) {
            SuccessStory::create($story);
        }
    }
}
