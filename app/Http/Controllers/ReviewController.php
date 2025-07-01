<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Create a new review instance and save it to the database
        $review = new Review();
        $review->name = $request->input('name');
        $review->city = $request->input('city');
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');
        $review->save();

        // Return a response (you can customize this as needed)
        return redirect()->route('home')->with('success', 'Review berhasil ditambahkan!');
    }
}
