<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'user_id' => 1,
                'name' => 'Adam Mohammed',
                'title' => 'Software Developer | Graphic Designer | Electrical and Electronics Engineer',

                'about_me' => '
                <p>As the founder of DevCentric Studio, I am not only a web developer and graphic designer but also hold a B.Eng in Electrical and Electronics Engineering. 
                This combination of technical expertise and creative skills allows me to bring a unique perspective to each project.

                Being a tech enthusiast, I am always eager to learn and expand my knowledge in web development and design. 
                I find joy in coding and staying up-to-date with the latest trends and technologies in the industry.</p>
                
                <p>
                   Passionate about technology and its endless possibilities, 
                   I am a true tech enthusiast who finds joy in crafting elegant and functional web solutions. 
                   From creating visually stunning websites to developing intuitive user interfaces, 
                   I thrive on the challenges that come with pushing the boundaries of digital design.
                </p>

                <p>
                With a keen eye for aesthetics and attention to detail, I bring a touch of creativity to all my projects.
                Whether it\'s designing captivating graphics, creating intuitive user experiences, or optimizing websites for optimal performance,
                I strive to deliver visually appealing and engaging digital experiences that leave a lasting impression.
                </p>
                ',
                'facebook' => 'https://web.facebook.com/adam.muhammed.eden',
                'twitter' => 'https://twitter.com/Adams__Mohammed',
                'instagram' => 'https://www.instagram.com/adam_eden_mo/',
                'linkedin' => 'https://www.linkedin.com/in/adam-mohammmed-1507b8139/',
                'whatsapp' => 'https://wa.me/+2347060741999',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Add more profiles as needed
        ];

        DB::table('profiles')->insert($profiles);
    }
}
