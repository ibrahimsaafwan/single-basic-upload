<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->paginate(6);
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(ImageRequest $request)
    {
        $file = $request->file('image');
        $fileName = time() . "_" . uniqid() . "." . $file->extension();
        $path = $file->storeAs('uploads', $fileName, 'public');

        Image::create(['image' => $path]);

        return redirect()->route('images.index')->with('status', 'Image uploaded successfully!');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(ImageRequest $request, Image $image)
    {
        Storage::disk('public')->delete($image->image);

        $file = $request->file('image');
        $fileName = time() . "_" . uniqid() . "." . $file->extension();
        $path = $file->storeAs('uploads', $fileName, 'public');

        $image->update(['image' => $path]);

        return redirect()->route('images.index')->with('status', 'Image updated successfully!');
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return redirect()->route('images.index')->with('status', 'Image deleted successfully!');
    }
}
