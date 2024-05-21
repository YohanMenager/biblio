@extends('admin.layout')
@section('content')

<div class="container mx-auto px-4">
    <table class="table-auto w-full bg-gray-100 text-gray-800 border border-gray-300 shadow-xl rounded-lg">
        <thead>
            <tr>
                <th class="px-4 py-2">ID Genre</th>
                <th class="px-4 py-2">Genre</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mesGenres as $unGenre)
            <tr>
                <td class="border px-4 py-2">{{$unGenre['id_genre']}}</td>
                <td class="border px-4 py-2">{{$unGenre['libelle']}}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('genres.edit', $unGenre->id_genre) }}" class="btn btn-secondary px-2 py-1 bg-gray-800 hover:bg-gray-900 text-white font-bold rounded-full shadow-md transition duration-300 ease-in-out transform hover:scale-105" tabindex="-1" role="button">Modifier</a>
                    <form action="{{ route('genres.destroy', $unGenre->id_genre) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary px-2 py-1 bg-gray-800 hover:bg-gray-900 text-white font-bold rounded-full shadow-md transition duration-300 ease-in-out transform hover:scale-105">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-8">
        <a href="{{ route('genres.create') }}" class="inline-block bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-6 rounded-full shadow-xl transition duration-300 ease-in-out transform hover:scale-105">Ajouter un Genre</a>
    </div>
</div>


@endsection
