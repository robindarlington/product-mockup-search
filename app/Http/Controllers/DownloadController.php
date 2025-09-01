<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DownloadController extends Controller
{
    public function downloadImage(Request $request)
    {
        $file = $request->get('file');

        if (!$file || !Storage::disk('public')->exists($file)) {
            abort(404, 'File not found');
        }

        return Storage::disk('public')->download($file);
    }

    public function downloadAll()
    {
        $zipFile = storage_path('app/temp/mockups-belair.zip');
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'));
        }

        $zip = new ZipArchive();
        if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
            abort(500, 'Failed to create archive');
        }

        $files = Storage::disk('public')->files('img');

        foreach ($files as $file) {
            $zip->addFile(Storage::disk('public')->path($file), basename($file));
        }

        $zip->close();

        return response()->download($zipFile)->deleteFileAfterSend(true);
    }
}
