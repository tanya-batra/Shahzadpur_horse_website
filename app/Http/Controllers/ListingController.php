<?php

namespace App\Http\Controllers;

use App\Models\listingCategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /* ----------------- CATEGORY ----------------- */
    public function categoryIndex()
    {
       $categories = listingCategory::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.view-listingcategory', compact('categories'));
    }

    public function categoryCreate()
    {
        return view('admin.create-listingcategory');
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('listingcategory'), $filename);
            $path = 'listingcategory/' . $filename;
        }

        listingCategory::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'image' => $path
        ]);

        return redirect()->route('categories.create')->with('success', 'Category created successfully.');
    }

  /* ----------------- EDIT CATEGORY ----------------- */
public function categoryEdit(listingCategory $category)
{
    return view('admin.create-listingcategory', compact('category'));
}

/* ----------------- UPDATE CATEGORY ----------------- */
public function categoryUpdate(Request $request, listingCategory $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'image' => 'nullable|image|max:2048'
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('listingcategory'), $filename);
        $category->image = 'listingcategory/' . $filename;
    }

    // Update other fields
    $category->name = $request->name;
    $category->short_description = $request->short_description;
    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

/* ----------------- DELETE CATEGORY ----------------- */
public function categoryDestroy(listingCategory $category)
{
    // Delete image if exists
    if ($category->image && file_exists(public_path($category->image))) {
        unlink(public_path($category->image));
    }

    $category->delete();
    return back()->with('success', 'Category deleted successfully.');
}

   public function subIndex()
    {
        $subcategories = Subcategory::with('category')->latest()->paginate(10);
        return view('admin.view-subcategory', compact('subcategories'));
    }

    // Show create form
    public function Create()
    {
        $categories = listingCategory::all();
        return view('admin.create-subcategory', compact('categories'));
    }
public function Store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:listingcategories,id',
        'name' => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'image' => 'nullable|image|max:2048'
    ]);

    $path = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('subcategories'), $filename);
        $path = 'subcategories/' . $filename;
    }

    Subcategory::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'short_description' => $request->short_description,
        'image' => $path,
    ]);

  return redirect()->back()->with('success', 'Subcategory created successfully.');

}

    public function edit(Subcategory $subcategory)
    {
        $categories = ListingCategory::all();
        return view('admin.create-subcategory', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:listingcategories,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($subcategory->image && file_exists(public_path($subcategory->image))) {
                unlink(public_path($subcategory->image));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('subcategories'), $filename);
            $subcategory->image = 'subcategories/' . $filename;
        }

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'short_description' => $request->short_description,
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        if ($subcategory->image && file_exists(public_path($subcategory->image))) {
            unlink(public_path($subcategory->image));
        }
        $subcategory->delete();
        return back()->with('success', 'Subcategory deleted successfully.');
    }
    public function toggleStatus($id)
{
    $category = listingCategory::findOrFail($id);

    $category->status = !$category->status;
    $category->save();

    return response()->json([
        'success' => true,
        'status' => $category->status
    ]);
}

}
