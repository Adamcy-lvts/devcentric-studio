<?php

namespace App\Livewire;

use App\Models\Hero;
use App\Models\AboutUs;
use App\Models\Service;
use Livewire\Component;
use App\Models\Approach;
use App\Models\OurMission;
use App\Models\WhyChooseUs;
use App\Models\SuccessStory;
use App\Models\IndustrySolution;

class LandingPageComponent extends Component
{

    public $hero;
    public $services;
    public $whyChooseUs;
    public $successStories;
    public $approach;
    public $industrySolutions;
    public $aboutUs;
    public $ourMission;


    public function mount() {
        $this->hero = Hero::first();
        $this->services = Service::all();
        $this->whyChooseUs = WhyChooseUs::first();
        $this->successStories = SuccessStory::all();
        $this->approach = Approach::first();
        $this->industrySolutions = IndustrySolution::all();
        $this->aboutUs = AboutUs::first();
        $this->ourMission = OurMission::first();

    }
    public function render()
    {
        return view('livewire.landing-page-component');
    }
}
