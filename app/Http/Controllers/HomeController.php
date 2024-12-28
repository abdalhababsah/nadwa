<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\LatestWork;

class HomeController extends Controller
{
    /**
     * Show the home page with dynamic content.
     */
    public function index()
    {
        // Fetch services
        $services = Service::all();

        // Fetch latest works grouped by category
        $interiorWorks = LatestWork::where('category', 'interior')->orderBy('created_at', 'desc')->get();
        $exteriorWorks = LatestWork::where('category', 'exterior')->orderBy('created_at', 'desc')->get();

        return view('welcome', compact('services', 'interiorWorks', 'exteriorWorks'));
    }
}