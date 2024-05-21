@extends('admin.layout')
@section('content')

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
	<title>Ouvrages</title>

</head>

    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
							<h2>Liste des ouvrages</h2>
				</div>
				<table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Titres</th>
                            <th>Editeurs</th>
                            <th>Auteurs</th>
                            <th>Types</th>
                            <th>Genres</th>
                            <th>

							<a href="{{ route('ouvrages.create') }}" class="btn btn-success" data-toggle="modal" style="display: flex; align-items: center;"><i class="material-icons" style="width:50px;">&#xE147;</i> <span>Ajouter un ouvrage</span></a>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($livres as $livre)
                        <tr>
                            <td> {{ $livre->titre}}</td>
                            <td> {{ $livre->editeurs }}</td>
                            <td>
                                @foreach($livre->auteurs as $auteur)
                                    {{ $auteur->nom }} {{ $auteur->prenom }}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td> {{ $livre->type}}  </td>
                            <td>
                                @foreach($livre->genres as $genre)
                                    {{ $genre->libelle }}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                                <td>
                                    <a href="{{ route('ouvrages.edit', $livre->id_ouvrage) }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <form action="{{ route('ouvrages.destroy', $livre->id_ouvrage) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer cet ouvrage?')" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
			</div>
		</div>
    </div>
    <div class="flex justify-center my-8">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            {{-- Previous Page Link --}}
            @if ($livres->onFirstPage())
                <span
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                    aria-disabled="true" aria-label="@lang('pagination.previous')">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $livres->previousPageUrl() }}"
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($livres->getUrlRange(1, $livres->lastPage()) as $page => $url)
                @if ($page === $livres->currentPage())
                    <span aria-current="page"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-indigo-500 text-sm font-medium text-white hover:bg-indigo-600">{{ $page }}</span>
                @else
                    <a href="{{ $url }}"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($livres->hasMorePages())
                <a href="{{ $livres->nextPageUrl() }}"
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                    aria-disabled="true" aria-label="@lang('pagination.next')">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </nav>
    </div>@endsection
