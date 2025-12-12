<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Add this

class BreedController extends Controller
{
    // Show create/edit form
    public function create()
    {
        $breeds = Breed::latest()->paginate(5); 
        return view('admin.create-breed', compact('breeds'));
    }

    public function edit(Breed $breed)
    {
        $breeds = Breed::latest()->paginate(10);
        return view('admin.create-breed', compact('breed', 'breeds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'breedname' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'breed_image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('breed_image')) {
            $imagePath = $request->file('breed_image')->store('breed_images', 'public');
        }

        Breed::create([
            'breedname' => $request->breedname,
            'short_description' => $request->short_description,
            'breed_image' => $imagePath,
        ]);

        return redirect()->route('breeds.create')->with('success', 'Breed created successfully.');
    }

    public function update(Request $request, Breed $breed)
    {
        $request->validate([
            'breedname' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'breed_image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('breed_image')) {
            if ($breed->breed_image && Storage::disk('public')->exists($breed->breed_image)) {
                Storage::disk('public')->delete($breed->breed_image);
            }
            $breed->breed_image = $request->file('breed_image')->store('breed_images', 'public');
        }

        $breed->breedname = $request->breedname;
        $breed->short_description = $request->short_description;
        $breed->save();

        return redirect()->route('breeds.create')->with('success', 'Breed updated successfully.');
    }

    public function destroy(Breed $breed)
    {
        // Delete image from storage
        if ($breed->breed_image && Storage::disk('public')->exists($breed->breed_image)) {
            Storage::disk('public')->delete($breed->breed_image);
        }

        $breed->delete();
        return redirect()->route('breeds.create')->with('success', 'Breed deleted successfully.');
    }
}
