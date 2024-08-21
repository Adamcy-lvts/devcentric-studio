<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Approach;
use App\Models\OurMission;
use App\Models\WhyChooseUs;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use App\Models\IndustrySolution;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WelcomeController extends Controller
{
    public function profile()
    {

        $profile = Profile::first();
        $posts = Post::where('is_visible', 1)->latest()->take(3)->get();
        $hero = Hero::first();
        $industrySolutions = IndustrySolution::all();
        $services = Service::all();
        $whyChooseUs = WhyChooseUs::first();
        $successStories = SuccessStory::all();
        $approach = Approach::first();
        $aboutUs = AboutUs::first();
        $ourMission = OurMission::first();
        return view('welcome', [
            'profile' => $profile,
            'posts' => $posts,
            'hero' => $hero,
            'industrySolutions' => $industrySolutions,
            'services' =>  $services,
            'whyChooseUs' => $whyChooseUs,
            'successStories' => $successStories,
            'approach' => $approach,
            'aboutUs' => $aboutUs,
            'ourMission' => $ourMission,

        ]);
    }

    public function downloadQrCode()
    {
        $url = URL::to('/');  // Get the base URL of your application
    
        // Get the absolute path to the image file
        $logoPath = public_path('img/devcentric_logo_2.png');
    
        $qrCode = QrCode::format('png')
                        ->size(300)
                        ->errorCorrection('H')
                        ->margin(1)
                        ->color(0, 0, 0)
                        ->merge($logoPath, 0.3, true)
                        ->generate($url);
        
        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="devcentric_qr.png"',
        ];
    
        return response($qrCode)->withHeaders($headers);

        return response($qrCode)->withHeaders($headers);
    }
}
