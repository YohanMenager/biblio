
@extends('admin.layout')
@section('content')


<div class="overflow-x-auto">
        <div class="w-full max-w-xs mx-auto">
                    <h2 class="text-2xl font-bold">Modifier une réservation</span></h2>


<form action="/admin/reservation-modify" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf

    <div class="mb-4"><input type="text" name="id" value={{$reservation->id_reservation}} readonly></input></div>

    <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_utilisateur">
                    utilisateur
                </label>

                <select name="user" id="id_utilisateur"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @foreach($users as $unUtilisateur)
        @if ($unUtilisateur->id_utilisateur != $reservation->id_utilisateur)
        <option value={{$unUtilisateur->id_utilisateur}}>
            {{$unUtilisateur->prenom}}
            {{$unUtilisateur->nom}}
        </option>
        @else
        <option value={{$unUtilisateur->id_utilisateur}} selected>
            {{$unUtilisateur->prenom}}
            {{$unUtilisateur->nom}}
        </option>
        @endif

    @endforeach
</select>
    </div>
    <div class="mb-4">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_ouvrage">
                    ouvrage
                </label>

                <select name="ouvrage" id="id_ouvrage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @foreach($ouvrages as $unOuvrage)
        @if ($unOuvrage->id_ouvrage != $reservation->id_ouvrage)
        <option value={{$unOuvrage->id_ouvrage}}>
            {{$unOuvrage->titre}}
        </option>
        @else
        <option value={{$unOuvrage->id_ouvrage}} selected>
            {{$unOuvrage->titre}}
        </option>
        @endif

    @endforeach
    </select>

        </div>

        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="id_date">
                    date
                </label>

    <input id="id_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" name="date" value={{$reservation->date_reservation}}></input>

        </div>


    
    <input type="submit" value="valider" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
</form>
<div>

<a href="/admin/reservations"><button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mt-5">retour</button></a>

</div>
</div>
</div>
@endsection
