<?php

use App\Livewire\ImageSearch;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ThumbnailController;

Route::get("/", function () {
    return view("images");
});

Route::get("/thumbnail/{path}", [ThumbnailController::class, "generate"])
    ->name("thumbnail")
    ->where("path", ".*")
    ->middleware("signed");
Route::get("/download", [DownloadController::class, "downloadImage"])
    ->name("download.image")
    ->middleware("throttle:10,1");
Route::get("/download-all", [DownloadController::class, "downloadAll"])
    ->name("download.all")
    ->middleware("throttle:2,1");
