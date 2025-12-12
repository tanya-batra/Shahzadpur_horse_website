<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.view-blog', compact('blogs'));
    }


    public function create()
    {
        return view('admin.create-blog');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blogimage'), $imageName);
            $imagePath = 'blogimage/' . $imageName;
        }


        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect()->route('blogs.view')->with('success', 'Blog created successfully!');
    }


    public function show(Blog $blog)
    {
        return view('admin.show-blog', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.edit-blog', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|url',
        ]);

        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blogimage'), $imageName);
            $imagePath = 'blogimage/' . $imageName;
        }

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect()->route('blogs.view')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->delete();
        return redirect()->route('blogs.view')->with('success', 'Blog deleted successfully!');
    }
}
