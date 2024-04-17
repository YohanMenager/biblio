
@extends('layout.layout')
@section('content')


<div>
    <h1 class="text-5xl font-serif text-slate-500">modifier une réservation</h1>

<form action="/reservation-modify" method="post" class="mt-5">
    @csrf

    <table class="table-auto">
        <tr>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">identifiant</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">utilisateur</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">ouvrage</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">date</th>
        </tr>
        <tr class="hover:bg-gray-100">
            <!--id de la réservation
                ne peut pas être modifié, mais sert à récupérer la réservation à modifier dans la page d'après
            -->
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><input type="text" name="id" value={{$reservation->id_reservation}} readonly></input></td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
<!-- sélection de l'utilisateur
        Il y a une condition pour vérifier si l'utilisateur de chaque option est celui qui a fait la réservation
-->                
    <select name="user">
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
</td>
<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
    <!-- sélection de l'ouvrage
        Il y a une condition pour vérifier si l'ouvrage de chaque option est celui qui est réservé
--> 
    <select name="ouvrage">
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
</td>
<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
    <!--sélection de la date, par défaut celle de la réservation-->
    <input class="bg-gray-300 hover:bg-gray-400 text-slate-500 font-bold py-2 px-4 rounded" type="date" name="date" value={{$reservation->date_reservation}}></input>
</td>
</tr>
</table>
    <input type="submit" value="valider" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">    
</form>
<div>

<a href="/reservations"><button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mt-5">retour</button></a>

@endsection
