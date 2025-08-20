<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all()->load('user','category');
        return view('frontend.blogs.index',compact('blogs'));
    }
    public function blogsUser()
    {
        $user = Auth::user();
        $blogs = Blog::where('user_id',$user->id)->latest()->paginate(10);
        return view('frontend.blogs.user',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('frontend.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
                $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:6000', // Max 2MB
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $request->has('is_published') ? now() : null;

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::with(['user', 'category'])->where('id', $id)->firstOrFail();
        return view('frontend.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $categories = Category::all();
        return view('frontend.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:6000',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $request->has('is_published') ? now() : ($blog->published_at ?? null);

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('blogs.show', $blog->id)->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $blog = Blog::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
