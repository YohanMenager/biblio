
@extends('layout.layout')
@section('content')
<div>
    <h1 class="text-5xl font-serif text-slate-500">nouvelle réservation</h1>
<form action="/reservations-create" method="post" class="mt-5">
    @csrf
    <table class="table-auto">
        <tr>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">utilisateur</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">ouvrage</th>
        </tr>
        <tr>
        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
    <select name="user">
    @foreach($users as $unUtilisateur)
    <option value={{$unUtilisateur->id_utilisateur}}>
        {{$unUtilisateur->prenom}}
        {{$unUtilisateur->nom}}
</option>
    @endforeach   
     
</select></td>
<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
    <select name="ouvrage">
    @foreach($ouvrages as $unOuvrage)
    <option value={{$unOuvrage->id_ouvrage}}>
        {{$unOuvrage->titre}}
    </option>
    
    @endforeach    
    </select>
</td>
</tr>
</table>
    <input type="submit" value="valider" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
</form>

<a href="/reservations"><button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mt-5">retour</button></a>

</div>


@endsection
