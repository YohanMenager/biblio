@extends('layout')

@section('title', 'Ajouter un emprunt')

@section('content')

    <h1>Ajouter un  emprunt</h1>

    {{-- Formulaire de création d'emprunt --}}
    <form action="{{ route('emprunts.store') }}" method="post" class="flex flex-col w-80 mt-4">
        @csrf

        <label for="id_ouvrage">Id de l'ouvrage</label>
        <input type="text" name="libelle" id="libelle" class="border-2 border-black m-2 p-2">
        @error('libelle')
            <small>{{ $message }}</small>
        @enderror

        <button type="submit" class="border-2 border-black">Ajouter</button>
    </form>

    <a href="{{ route('emprunts.index') }}" class="text-blue-600 underline">Revenir en arrière</a>
@endsection