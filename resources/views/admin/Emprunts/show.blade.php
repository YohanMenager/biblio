@extends('layout')

@section('title', 'Emprunts')

@section('content')


    {{-- Liste des emprunts --}}
    <table>
        <caption class="m-2 text-xl underline text-left">Emprunt numéro {{$emprunt->id_emprunt}}</caption>
        <thead>
            <tr class="bg-slate-400">
                <th>Id_Emprunt</th>
                <th>Id_Ouvrage</th>
                <th>Id_Utilisateur</th>
                <th>Date_Emprunt</th>
                <th>Date_Retour_Prevue</th>
                <th>Date_Retour_Reel</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $emprunt->id_emprunt }}</td>
                    <td>{{ $emprunt->id_ouvrage }}</td>
                    <td>{{ $emprunt->id_utilisateur }}</td>
                    <td>{{ $emprunt->date_emprunt }}</td>
                    <td>{{ $emprunt->date_retour_prevue }}</td>
                    <td>{{ $emprunt->date_retour_reel }}</td>
                </tr>
        </tbody>
    </table>

    <p class="mt-5"><a href="{{ route('emprunts.edit', $emprunt) }}" class="text-red-600 underline">Modifier cet emprunt</a></p>

    <p class="mt-5"><a href="{{ route('emprunts.index') }}" class="text-blue-600 underline">Revenir en arrière</a></p>

    @endsection