    @extends('admin.layout')
{{-- Cette ligne étend un fichier de layout de base nommé layout.blade.php. --}}
@section('content')
{{-- Cette section est où le contenu principal de la page sera inséré. --}}

@if (Session::has('success'))
    <div id="alert-success" class="relative px-3 py-3 mb-4 border rounded text-green-700 border-green-300 bg-green-100" role="alert" style="margin-right:20px;">
        <h4 class="alert-heading">Succès!</h4>
        <p>{{ Session::get('success') }}</p>
        <script>
            setTimeout(function(){
                document.getElementById('alert-success').style.display = 'none';
            }, 10000);
        </script>
    </div>
@endif

{{-- Cette partie permet d'afficher un message de succès quand un ouvrage est ajouté --}}

<div class="container w-3/5 mx-auto px-4">
    <div class="flex flex-col -my-2   lg:-mx-8 py-3    sm:px-6 lg:px-8">
            <div class=" overflow-hidden   sm:rounded-lg">
                <table class="min-w-full ">
                    <div class="table-title">
                        <h2 class="px-4 " style= "font-size:40px;">Liste des ouvrages</h2>
                    </div>
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    {{-- Ce thead contient les en-têtes de la table. --}}
                        <tr>
                        {{-- Ce tr représente une ligne de l'en-tête. --}}
                            <th scope="col" class="px-6 py-3 text-left text-M  uppercase tracking-wider">Titres</th>
                            <th scope="col" class="px-6 py-3 text-left text-M  uppercase tracking-wider">Editeurs</th>
                            <th scope="col" class="px-6 py-3 text-left text-M  uppercase tracking-wider">Auteurs</th>
                            <th scope="col" class="px-6 py-3 text-left text-M  uppercase tracking-wider">Types</th>
                            <th scope="col" class="px-6 py-3 text-left text-M  uppercase tracking-wider">Genres
                                <span class=" sr-only">Ajouter un ouvrage</span>
                                <a href="{{ route('ouvrages.create') }}" class=" bg-green-500 hover:bg-green-700 text-white text-xs font-bold py-2 px-4 rounded">
                                    <i class="fas fa-plus"></i> Ajouter un ouvrage
                                </a>
                            </th>
                            {{-- Ce th contient un lien pour ajouter un nouvel ouvrage. --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white  ">
                    {{-- Ce tbody contient les données des ouvrages. --}}
                        @foreach($livres as $livre)
                        {{-- Cette boucle parcourt la collection $livres. --}}
                            <tr >
                                <td class="px-6 py-4 ">{{ $livre->titre }}</td>
                                <td class="px-6 py-4 ">{{ $livre->editeurs->libelle }}</td>
                                <td class="px-6 py-4 ">
                                    @foreach($livre->auteurs as $auteur)
                                        {{ $auteur->nom }} {{ $auteur->prenom }}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                    {{-- Ce td affiche les auteurs du livre. --}}
                                </td>
                                <td class="px-6 py-4 ">{{ $livre->type }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            @foreach($livre->genres as $genre)
                                                {{ $genre->libelle }}
                                                @if(!$loop->last)
                                                ,
                                                @endif
                                            @endforeach
                                            {{-- Ce td affiche les genres du livre. --}}
                                        </div>
                                        <div>
                                            <a href="{{ route('ouvrages.edit', $livre->id_ouvrage) }}" class="text-indigo-600 hover:text-indigo-900">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ouvrages.destroy', $livre->id_ouvrage) }}" method="post" class="inline">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Voulez vous vraiment supprimer cet ouvrage?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            {{-- Ce td contient les liens pour éditer ou supprimer le livre. --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>

<div class="flex justify-center my-8">
{{-- Ce div contient la pagination. --}}
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        @if ($livres->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-3 border border-gray-300 bg-white text-sm font-medium text-gray-500" aria-disabled="true" aria-label="@lang('pagination.previous')">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $livres->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-3 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        @foreach ($livres->getUrlRange(1, $livres->lastPage()) as $page => $url)
            @if ($page === $livres->currentPage())
                <span aria-current="page" class="relative inline-flex items-center px-4 py-3 border border-gray-300 bg-indigo-500 text-sm font-medium text-white">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-3 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</a>
            @endif
        @endforeach
    </nav>
</div>

@endsection
