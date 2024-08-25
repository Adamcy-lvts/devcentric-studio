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
                <p>As the founder of DevCentric Studio, I bring a multifaceted skill set to the table. With a bachelor\'s degree in Electrical and Electronics Engineering, I\'ve cultivated a deep technical foundation that synergizes harmoniously with my roles as a web developer and graphic designer.</p>
                <p>My journey is one of perpetual growth and exploration. In a rapidly evolving landscape, I remain dedicated to continuous learning, perpetually seeking to expand my horizons within the realms of web development and design. Each project is a fresh canvas for me to paint upon, as I integrate innovative technologies and design paradigms to deliver solutions that resonate both aesthetically and functionally.</p>
                <p>At heart, I am an advocate for the boundless potential of technology. My passion emanates from the belief that elegant solutions lie at the intersection of creativity and precision. From weaving visually captivating websites to sculpting seamless user interfaces, I thrive amidst the challenges that arise from pushing the frontiers of digital craftsmanship.</p>
                <p>My discerning eye for aesthetics, coupled with an unwavering commitment to meticulousness, imparts a distinct touch of creativity to every endeavor. My goal is not just to create, but to create impact—be it through evocative graphics, intuitive user experiences, or finely tuned performance optimization. My commitment to delivering captivating, immersive digital experiences remains unwavering, leaving a trail of lasting impressions in my wake.</p>
            ',
                'facebook' => 'https://web.facebook.com/adam.muhammed.eden',
                'twitter' => 'https://twitter.com/adam_devcentric',
                'instagram' => 'https://www.instagram.com/adam_eden_mo/',
                'linkedin' => 'https://www.linkedin.com/in/adam-mohammmed-1507b8139/',
                'whatsapp' => 'https://wa.me/+2348081816703',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Add more profiles as needed
        ];

        DB::table('profiles')->insert($profiles);
    }
}
