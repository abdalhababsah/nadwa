<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LatestWork;
use App\Models\Category;

class LatestWorkController extends Controller
{
    /**
     * Display a listing of the latest works.
     */
    public function index()
    {
        // Retrieve all latest works with their categories
        $latestWorks = LatestWork::with('category')->get();

        return view('latest-works.index', compact('latestWorks'));
    }

    /**
     * Show the form for creating a new latest work.
     */
    public function create()
    {
        $categories = Category::all();
        return view('latest-works.create', compact('categories'));
    }

    /**
     * Store a newly created latest work in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048', // Max 2MB
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('latest_works', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Create latest work
        LatestWork::create($validated);

        return redirect()->route('latest-works.index')->with('success', 'Latest work created successfully.');
    }

    // Add other necessary methods (edit, update, destroy) as needed
}