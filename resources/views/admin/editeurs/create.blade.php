@extends('admin.layout')

@section('title', 'Ajouter un éditeur')

@section('content')

    <h1>Ajouter un éditeur</h1>

    {{-- Formulaire de création d'éditeur --}}
    <form action="{{ route('editeurs.store') }}" method="post" class="flex flex-col w-80 mt-4">
        @csrf

        <label for="libelle">Nom de l'éditeur</label>
        <input type="text" name="libelle" id="libelle" class="border-2 border-black m-2 p-2">
        @error('libelle')
            <small>{{ $message }}</small>
        @enderror

        <button type="submit" class="border-2 border-black">Ajouter</button>
    </form>

    <a href="{{ route('editeurs.index') }}" class="text-blue-600 underline">Revenir en arrière</a>
@endsection
