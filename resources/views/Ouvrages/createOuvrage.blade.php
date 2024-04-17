
@extends('layout.layout')
@section('content')

<div>
    <h1 class="text-5xl font-serif text-slate-500">nouveau livre</h1>
<form action="{{route('ouvrages.store')}}" method="post" class="mt-5">
    @csrf
    <table class="table-auto">
        <tr>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">titre</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">isbn</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">type</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">auteurs</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">éditeur</th>
            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">genres</th>
        </tr>
        <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><input type="text" name="titre" class="border dark:border-slate-600"></input></td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><input type="text" name="isbn" class="border dark:border-slate-600"></input></td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                <select name="type">
                    <option value="livre">livre</option>
                    <option value="magazine">magazine</option>
                    <option value="ebook">ebook</option>
                </select>
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                <select name="auteurs[]" multiple>
                    @foreach($auteurs as $unAuteur)
                        <option value={{$unAuteur->id_auteur}}>
                            {{$unAuteur->prenom}}
                            {{$unAuteur->nom}}
                        </option>
                    @endforeach                     
                </select>
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                <select name="editeur">
                    @foreach($editeurs as $unEditeur)
                        <option value={{$unEditeur->id_editeur}}>
                            {{$unEditeur->libelle}}
                        </option>
                    
                    @endforeach    
                </select>
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                <select name="genres[]" multiple>
                    @foreach($genres as $unGenre)
                        <option value={{$unGenre->id_genre}}>
                            {{$unGenre->libelle}}
                        </option>
                    @endforeach                     
                </select>
            </td>
        <tr>
</table>
            <input type="submit" value="valider" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
</form>

<a href="/ouvrages"><button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mt-5">retour</button></a>

</div>

@endsection