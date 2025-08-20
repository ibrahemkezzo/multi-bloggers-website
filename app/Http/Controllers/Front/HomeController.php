<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
// Get top 3 categories with the most blogs
        $topCategories = Category::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->take(3)
            ->get();

        // Get latest 6 published blogs
        $latestBlogs = Blog::where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.index', compact('topCategories', 'latestBlogs'));
    }


}
