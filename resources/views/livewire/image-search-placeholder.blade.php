<div class="container mx-auto py-4">
    <div class="container text-center mb-0"><a href="https://belair.bio/" target="_blank">
    <x-belairlogo width="200" height="200" class="mx-auto"/></a>
    <p> Télécharger nos images produits</p>
    </div>
        <div class="container mb-6">
        <input wire:model.live="search"
               placeholder="Rechercher par nom de plante (sans accents)..."
               type="search"
               class="block w-full bg-white glass focus:outline-none focus:bg-white focus:shadow text-gray-700 font-bold rounded-lg px-4 py-3"
        />
        <p class="text-center">Cliquer sur une image pour la télécharger. Ou <a href="{{ route('download.all') }}" class="text-lavande_dark">télécharger toutes les images sous forme d'un fichier .zip</a></p>
    </div>

    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 list-none">
        @for ($i = 0; $i < 12; $i++)
            <li class="text-center">
                <div class="w-full h-48 bg-gray-200 animate-pulse"></div>
                <div class="w-full h-4 mt-2 bg-gray-200 animate-pulse"></div>
            </li>
        @endfor
    </ul>
</div>
