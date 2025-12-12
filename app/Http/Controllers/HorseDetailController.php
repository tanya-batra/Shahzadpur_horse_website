<?php

namespace App\Http\Controllers;

use App\Models\HorseDetail;
use App\Models\HorseImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HorseDetailController extends Controller
{
    // View all horse details
    public function index()
    {
        $horses = HorseDetail::with(['subcategory', 'images'])->latest()->paginate(10);
        return view('admin.view-horsedetail', compact('horses'));
    }

    // Show create form
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('admin.add-horsedetail', compact('subcategories'));
    }

    // Store horse detail
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'horse_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:100',
            'age' => 'nullable|string|max:50',
            'height' => 'nullable|string|max:50',
            'images.*' => 'nullable|image|max:2048',
        ]);

        // Only one horse detail per subcategory
        $horse = HorseDetail::firstOrCreate(
            ['subcategory_id' => $request->subcategory_id],
            [
                'horse_name' => $request->horse_name,
                'description' => $request->description,
                'color' => $request->color,
                'age' => $request->age,
                'height' => $request->height,
            ]
        );

        if (!$horse->wasRecentlyCreated) {
            $horse->update([
                'horse_name' => $request->horse_name ?? $horse->horse_name,
                'description' => $request->description ?? $horse->description,
                'color' => $request->color ?? $horse->color,
                'age' => $request->age ?? $horse->age,
                'height' => $request->height ?? $horse->height,
            ]);
        }

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('horse_images'), $filename);
                HorseImage::create([
                    'horse_detail_id' => $horse->id,
                    'image_path' => 'horse_images/' . $filename
                ]);
            }
        }

        return redirect()->back()->with('success', 'Horse details saved successfully.');
    }

    // Edit form
    public function edit(HorseDetail $horse)
    {
        $subcategories = Subcategory::all();
        $horse->load('images');
        return view('admin.add-horsedetail', compact('horse', 'subcategories'));
    }

    // Update horse detail
    public function update(Request $request, HorseDetail $horse)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'horse_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:100',
            'age' => 'nullable|string|max:50',
            'height' => 'nullable|string|max:50',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $horse->update([
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'horse_name' => $request->horse_name,
            'color' => $request->color,
            'age' => $request->age,
            'height' => $request->height,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('horse_images'), $filename);
                HorseImage::create([
                    'horse_detail_id' => $horse->id,
                    'image_path' => 'horse_images/' . $filename
                ]);
            }
        }

        return redirect()->route('horses.index')->with('success', 'Horse details updated successfully.');
    }

    // Delete horse detail
    public function destroy(HorseDetail $horse)
    {
        // Delete images from folder
        foreach ($horse->images as $img) {
            if (file_exists(public_path($img->image_path))) {
                unlink(public_path($img->image_path));
            }
            $img->delete();
        }

        $horse->delete();
        return redirect()->back()->with('success', 'Horse detail deleted successfully.');
    }

    // Delete single image
    public function deleteImage(HorseImage $image)
    {
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }
        $image->delete();
        return back()->with('success', 'Image deleted successfully.');
    }
}
