<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        logger("abc");
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            return response()->json(['message' => 'Image uploaded successfully', 'path' => $path], 200);
        }

        return response()->json(['message' => 'No image found'], 400);
    }
}
