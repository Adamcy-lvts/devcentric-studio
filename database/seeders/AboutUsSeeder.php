<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AboutUs::create([
            'title' => 'About Us',
            'content' => 'DevCentric stands at the forefront of digital innovation, crafting cutting-edge software solutions that empower organizations across diverse sectors. Our expertise spans custom software development, web and mobile applications, cloud solutions, AI integration, and data analytics. From startups to enterprise-level organizations, we tailor our approach to meet the unique needs of each client, driving efficiency, enhancing user experiences, and fostering sustainable growth.

Our team of passionate technologists and problem-solvers is committed to delivering innovative solutions that not only meet but exceed our clients\' expectations, positioning them at the cutting edge of their industries.',
            'expertise_areas' => json_encode([
                'Custom software development',
                'Web and mobile applications',
                'Cloud solutions and DevOps',
                'AI and machine learning integration',
                'Data analytics and business intelligence'
            ]),
        ]);
    }
}
