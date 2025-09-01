<div class="container mx-auto py-4" wire:init="loadImages">
    <div class="container text-center mb-0"><a href="https://belair.bio/" target="_blank">
    <x-belairlogo width="200" height="100" class="mx-auto mb-0"/></a>
    <p class="text-center mb-3">Cliquer sur une image pour la télécharger. Ou <a href="{{ route('download.all') }}" class="text-lavande_dark hover:text-violet">télécharger toutes les images sous forme d'un fichier .zip</a></p>
</div>
        <div class="container mb-6"x-data x-init="$refs.searchInput.focus()">
        <input wire:model.live="search"
            x-ref="searchInput"
               placeholder="Rechercher par nom de plante (sans accents)..."
               type="search"
               id="imageSearchInput"
               class="block w-full bg-white glass focus:outline-none focus:bg-white focus:shadow text-gray-700 font-bold rounded-lg px-4 py-3"
        />
       </div>

    @if ($readyToLoad)
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 list-none">
            @foreach ($filteredImages as $item)
                <li class="text-center" x-data="{ loaded: false }">
                    <a title="{{ strtoupper($item['plante']) }} - {{ $item['produit'] }} {{ $item['meta'] ? ' - ' . $item['meta'] : '' }}"
                       target="_blank"
                       href="{{ route('download.image', ['file' => $item['image']]) }}">
                        <img class="img-fluid transition-opacity duration-500"
                             :class="{ 'opacity-0': !loaded }"
                             src="{{ $item['thumb'] }}"
                             alt="{{ strtoupper($item['plante']) }} - {{ $item['produit'] }} {{ $item['meta'] ? ' - ' . $item['meta'] : '' }}"
                             @load="loaded = true">
                        <span class="block text-uppercase">{{ strtoupper($item['plante']) }} - {{ $item['produit'] }} {{ $item['meta'] ? ' - ' . $item['meta'] : '' }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="text-center">
            <p>Loading...</p>
        </div>
    @endif
</div>
