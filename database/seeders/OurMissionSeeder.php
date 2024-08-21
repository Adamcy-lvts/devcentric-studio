<?php

namespace Database\Seeders;

use App\Models\OurMission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OurMissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        OurMission::create([
            'title' => 'Our Mission',
            'content' => 'At DevCentric, we are driven by a singular purpose: to empower businesses through innovative technology solutions. Our mission is to be the catalyst for digital transformation, enabling our clients to thrive in an ever-evolving technological landscape.

We achieve this by innovating relentlessly to stay ahead of industry trends, building robust, scalable solutions tailored to each client\'s unique needs, and transforming businesses by unlocking their full digital potential.

Our team of passionate experts is committed to delivering excellence in every project, fostering long-term partnerships, and driving tangible results for our clients.',
            'mission_points' => json_encode([
                'Innovating relentlessly to stay ahead of industry trends',
                'Building robust, scalable solutions tailored to each client\'s unique needs',
                'Transforming businesses by unlocking their full digital potential'
            ]),
            'ceo_name' => 'Adamu Mohammed',
            'ceo_title' => 'Founder & CEO'
        ]);
    }
}
