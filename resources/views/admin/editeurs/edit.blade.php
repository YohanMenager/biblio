@extends('admin.layout')

@section('title', 'Modifier un éditeur')

@section('content')

    <h1>Modifier un éditeur</h1>

    {{-- Formulaire de modification d'éditeur --}}
    <form action="{{ route('editeurs.update', $editeur) }}" method="post" class="flex flex-col w-80 mt-4">
        @csrf
        @method('put')

        <label for="libelle">Nom de l'éditeur</label>
        <input type="text" name="libelle" id="libelle" class="border-2 border-black m-2 p-2"
            value="{{ $editeur->libelle }}">
        @error('libelle')
            <small>{{ $message }}</small>
        @enderror

        <button type="submit" class="border-2 border-black">Mettre à jour</button>
    </form>

    <p class="mt-5"><a href="{{ route('editeurs.index') }}" class="text-blue-600 underline">Revenir en arrière</a></p>
@endsection
