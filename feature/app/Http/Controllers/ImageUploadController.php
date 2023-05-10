<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {

            $image = $request->file('upload');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/abstractsFiles', $imageName);

            // Store image also in database
            $imagePath = 'storage/abstractsFiles/' . $imageName;

            return response()->json(['fileName' => $imageName, 'uploaded' => true, 'url' =>  asset($imagePath)]);
        }
    }
}
