<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ThumbnailController extends Controller
{
    public function generate(Request $request, $path)
    {
        $thumbnailPath = 'thumbnails/' . basename($path);

        if (Storage::disk('public')->exists($thumbnailPath)) {
            return Storage::disk('public')->response($thumbnailPath);
        }

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $manager = new ImageManager(new Driver());
        $image = $manager->read(Storage::disk('public')->get($path));

        $thumbnail = $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        Storage::disk('public')->put($thumbnailPath, (string) $thumbnail->encode());

        return response($thumbnail->encode(), 200, [
            'Content-Type' => $image->mime(),
        ]);
    }
}
