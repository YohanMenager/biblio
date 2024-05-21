@extends('layout')

@section('title', 'Ajouter un éditeur')

@section('content')

<h1>Modifier un éditeur</h1>

{{-- Formulaire de modification d'emprunt --}}
<form action="{{ route('emprunts.update', $emprunt) }}" method="post" class="flex flex-col w-80 mt-4">
    @csrf
    @method('put')

    <label for="id_ouvrage">Numero de l'ouvrage</label>
    <input type="text" name="id_ouvrage" id="id_ouvrage" class="border-2 border-black m-2 p-2"
        value="{{ $emprunt->id_ouvrage}}">
    @error('id_ouvrage')
        <small>{{ $message }}</small>
    @enderror

    <button type="submit" class="border-2 border-black">Mettre à jour</button>
</form>

<p class="mt-5"><a href="{{ route('emprunts.index') }}" class="text-blue-600 underline">Revenir en arrière</a></p>
@endsection