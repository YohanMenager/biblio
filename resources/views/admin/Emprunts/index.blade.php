@extends('layout')

@section('title', 'Emprunts')

@section('content')

    <h1>Liste des emprunts</h1>

        {{-- Liste des emprunts --}}
        <table>
            {{-- En-tête --}}
            <thead>
                <tr class="bg-slate-400">
                    <th>Id_Emprunt</th>
                    <th>Id_Ouvrage</th>
                    <th>Id_Utilisateur</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        {{-- Contenu --}}
        <tbody>
            @foreach ($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id_emprunt}}</td>
                    <td>{{ $emprunt->id_ouvrage }}</td>
                    <td>{{ $emprunt->id_utilisateur }}</td>

                    <td class="text-green-600 underline"><a href="{{ route('emprunts.show', $emprunt) }}">Détails</a></td>

                    <td class="text-blue-600 underline"><a href="{{ route('emprunts.edit', $emprunt) }}">Modifier</a></td>

                    <form action="{{ route('emprunts.destroy', $emprunt) }}" method="POST">
                        @csrf
                        @method('delete')

                        <td class="text-red-600"><button class="underline">Supprimer</button></td>
                    </form>

                </tr>
            @endforeach
        </tbody>
    </table>


  


    <p class="mt-5"><a href="{{ route('emprunts.create') }}" class="text-blue-600 underline">Ajouter un emprunt</a></p>

@endsection