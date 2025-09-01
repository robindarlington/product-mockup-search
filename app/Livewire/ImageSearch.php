<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ImageSearch extends Component
{
    public $search = "";
    public $images = [];
    public $readyToLoad = false;

    public function loadImages()
    {
        $this->readyToLoad = true;
    }

    public function getFilteredImagesProperty()
    {
        if (!$this->readyToLoad) {
            return [];
        }

        $files = Storage::disk("public")->files("img");
        $images = collect($files)
            ->map(function ($file) {
                $parts = explode("-", basename($file));
                $prod = "";
                if (isset($parts[2])) {
                    switch ($parts[2]) {
                        case "parfum_ambiance":
                            $prod = "Parfum ambiance";
                            break;
                        case "he":
                            $prod = "Huile essentielle";
                            break;
                        case "eau_florale":
                            $prod = "Eau Florale";
                            break;
                        case "hv":
                            $prod = "Huile végétale";
                            break;
                        case "mh":
                            $prod = "Macérat Huileux";
                            break;
                        case "extraitco2":
                            $prod = "Extrait CO2";
                            break;
                    }
                }

                $plante = isset($parts[3])
                    ? str_replace(
                        "_",
                        " ",
                        pathinfo($parts[3], PATHINFO_FILENAME),
                    )
                    : "";
                $meta = isset($parts[4])
                    ? str_replace(
                        "_",
                        " ",
                        pathinfo($parts[4], PATHINFO_FILENAME),
                    )
                    : "";

                return [
                    "image" => $file,
                    "thumb" => URL::signedRoute("thumbnail", ["path" => $file]),
                    "origine" => $parts[1] ?? "",
                    "produit" => $prod,
                    "plante" => $plante,
                    "meta" => $meta,
                    "search" => $prod . " " . $plante . " " . $meta,
                ];
            })
            ->sortBy("search")
            ->values();

        if (empty($this->search)) {
            return $images->all();
        }

        return $images
            ->filter(function ($item) {
                return str_contains(
                    strtolower($item["search"]),
                    strtolower($this->search),
                );
            })
            ->all();
    }

    public function render()
    {
        return view("livewire.image-search", [
            "filteredImages" => $this->filtered_images,
        ]);
    }
}
