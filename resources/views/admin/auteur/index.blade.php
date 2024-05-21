@extends('admin.layout')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-5">
<div class="bg-white shadow-md rounded my-6 w-full md:w-1/2">        <div >
            <h1 class="text-2xl font-bold mb-4 ml-4">Liste des auteurs</h1>
        </div>
        <div class="p-5">
            <table class="w-full text-left table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 w-1/3">Nom auteur</th>
                    <th class="px-4 py-2 w-1/3">Prenom auteur</th>
                    <th class="px-4 py-2 flex justify-end">
                        <a href="{{ route('auteurs.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-auto" data-toggle="modal" style="display: flex; align-items: center; margin-right:10px;"><i class="material-icons" style="width:50px;">&#xE147;</i> <span>Ajouter un auteur</span></a>
                        <a href="{{ route('ouvrages.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-auto" data-toggle="modal" style="display: flex; align-items: center;"><i class="material-icons" style="width:50px;">&#xE147;</i> <span>Créer ouvrage</span></a>
                    </th>
                </tr>
            </thead>


                <tbody>
                    @foreach($auteurs as $auteur)
                        <tr>
                            <td class="border px-4 py-2">{{ $auteur->nom }}</td>
                            <td class="border px-4 py-2">{{ $auteur->prenom }}</td>
                            <td class="border px-4 py-2 flex justify-end ">
                                <a href="{{ route('auteurs.edit', $auteur->id_auteur) }}" class="text-blue-500 hover:text-blue-800" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" style="margin-top:9px; margin-right:10px;">&#xE254;</i></a>
                                <form action="{{ route('auteurs.destroy', $auteur->id_auteur) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer cet auteur?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-center my-8">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <!-- Pagination Elements -->
            {{ $auteurs->links('pagination::tailwind') }}
        </nav>
    </div>
</div>
</body>
</html>
@endsection
