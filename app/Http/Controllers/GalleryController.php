<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
     public function index()
    {
        $categories = Category::all(); 
        return view('gallery', compact('categories'));
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $images = $category->images; 
        return view('gallery-images', compact('category', 'images'));
    }
   public function createImages()
{
    $categories = Category::all(); 
    return view('admin.add-images', compact('categories'));
}
public function storeImages(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'images.*'    => 'required|image|max:4096',
    ]);

    $category = Category::findOrFail($request->category_id);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('galleryimage'), $filename);

            $category->galleries()->create([
                'image' => 'galleryimage/' . $filename
            ]);
        }
    }

    return redirect()->route('gallery.images.create')
                     ->with('success', 'Images uploaded successfully.');
}

}
