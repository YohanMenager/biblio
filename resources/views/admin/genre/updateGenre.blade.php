@extends('admin.layout')
@section('content')
<div class="max-w-md mx-auto mt-8">
    <h1 class="text-4xl text-center mb-6">Modifier le nom du genre</h1>
    <form action="{{ route('genres.update', $genre) }}" id="formUpdateGenre" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="libelle" class="block text-gray-700 text-sm font-bold mb-2">Nom du genre modifié :</label>
            <input type="text" id="libelle" name="libelle" value='{{ $genre->libelle }}' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Valider</button>
        </div>
    </form>
</div>

@endsection
