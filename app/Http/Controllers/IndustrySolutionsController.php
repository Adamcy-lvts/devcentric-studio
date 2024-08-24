<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndustrySolution;

class IndustrySolutionsController extends Controller
{
    public function show($industry)
    {
        $solution = IndustrySolution::where('industry', str_replace('-', ' ', ucwords($industry)))->firstOrFail();
        

        return view('industry-solutions.show', compact('solution'));
    }
}
