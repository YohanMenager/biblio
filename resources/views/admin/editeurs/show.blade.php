@extends('admin.layout')

@section('title', "Insérer nom d'éditeur ici")

@section('content')

    <h1>{{ $editeur->libelle }}</h1>

    {{-- Liste des ouvrages de l'éditeur --}}
    <table>
        <caption class="m-2 text-xl underline text-left">Liste des ouvrages</caption>
        <thead>
            <tr class="bg-slate-400">
                <th>ID</th>
                <th>Titre</th>
                <th>ISBN</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($editeur->ouvrages as $ouvrage)
                <tr>
                    <td>{{ $ouvrage->id_ouvrage }}</td>
                    <td>{{ $ouvrage->titre }}</td>
                    <td>{{ $ouvrage->code_isbn }}</td>
                    <td>{{ $ouvrage->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-5"><a href="{{ route('editeurs.edit', $editeur) }}" class="text-red-600 underline">Modifier cet éditeur</a></p>

    <p class="mt-5"><a href="{{ route('editeurs.index') }}" class="text-blue-600 underline">Revenir en arrière</a></p>
@endsection
