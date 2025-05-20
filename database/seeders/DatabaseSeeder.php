<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Approach;
use App\Models\IndustrySolution;
use App\Models\SuccessStory;
use App\Models\WhyChooseUs;
use Database\Seeders\InvoiceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ServiceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(IndustrySolutionSeeder::class);
        $this->call(SuccessStorySeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(ApproachSeeder::class);
        $this->call(WhyChooseUsSeeder::class);
        $this->call(OurMissionSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(ProfileSeeder::class);

    }
}
