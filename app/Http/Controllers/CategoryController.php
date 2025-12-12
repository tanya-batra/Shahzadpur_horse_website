<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
 
    public function createCategory()
    {
        $categories = Category::latest()->paginate(3);
        return view('admin.create-category', compact('categories'));
    }


    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $destinationPath = public_path('gallerythumbnail');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }


            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $thumbnailPath = 'gallerythumbnail/' . $fileName;
        }

        Category::create([
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('gallery.categories.create')->with('success', 'Category created successfully.');
    }

    public function editCategory(Category $category)
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.create-category', compact('category', 'categories'));
    }


    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('thumbnail')) {
            if ($category->thumbnail && Storage::disk('public')->exists($category->thumbnail)) {
                Storage::disk('public')->delete($category->thumbnail);
            }
            $category->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('gallery.categories.create')->with('success', 'Category updated successfully.');
    }
    public function destroyCategory(Category $category)
    {
        if ($category->thumbnail && Storage::disk('public')->exists($category->thumbnail)) {
            Storage::disk('public')->delete($category->thumbnail);
        }
        $category->delete();
        return redirect()->route('gallery.categories.create')->with('success', 'Category deleted successfully.');
    }
}
