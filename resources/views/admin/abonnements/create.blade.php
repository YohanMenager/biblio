@extends('admin.layout')
@section('content')
<div class="container mx-auto">
    <div class="w-full max-w-xs mx-auto">
        <h2 class="text-2xl font-bold text-center my-4">Ajouter Abonnement</h2>
        <form action="{{ route('abonnements.store') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_type_abonnement">
                    Type d'Abonnement
                </label>
                <select id="id_type_abonnement" name="id_type_abonnement" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled selected hidden>Sélectionner un type d'Abonnement</option>
                    @foreach($type_abonnements as $type_abonnement)
                        <option value="{{ $type_abonnement->id_type_abonnement }}">{{ $type_abonnement->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_utilisateur">
                    Utilisateur
                </label>
                <select id="id_utilisateur" name="id_utilisateur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled selected hidden>Sélectionner un utilisateur</option>
                    @foreach($utilisateurs as $utilisateur)
                        <option value="{{ $utilisateur->id_utilisateur }}">{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_debut">
                    Date de Début
                </label>
                <input type="date" id="date_debut" name="date_debut" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_fin">
                    Date de Fin
                </label>
                <input type="date" id="date_fin" name="date_fin" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</div>
@endsection
