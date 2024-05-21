@extends('admin.layout')

@section('title', 'Editeurs')

@section('content')

    <h1>Liste des éditeurs</h1>

    {{-- Liste des éditeurs --}}
    <table>
        {{-- En-tête --}}
        <thead>
            <tr class="bg-slate-400">
                <th>ID</th>
                <th>Libellé</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        {{-- Contenu --}}
        <tbody>

            @foreach ($editeurs as $editeur)
                <tr>
                    <td>{{ $editeur->id_editeur }}</td>
                    <td>{{ $editeur->libelle }}</td>

                    {{-- Affiche les informations d'un éditeur --}}
                    <td class="text-green-600 underline">
                        <a href="{{ route('editeurs.show', $editeur) }}">Détails</a>
                    </td>

                    {{-- Affiche le formulaire de modification --}}
                    <td class="text-blue-600 underline">
                        <a href="{{ route('editeurs.edit', $editeur) }}">Modifier</a>
                    </td>

                    {{-- Supprime l'éditeur sélectionné (avec un message de confirmation) --}}
                    <form action="{{ route('editeurs.destroy', $editeur) }}" method="POST">
                        @csrf
                        @method('delete')

                        <td class="text-red-600">
                            <button class="underline"
                            onclick="return confirm('Voulez-vous supprimer cet éditeur ?')">Supprimer</button>
                        </td>
                    </form>

                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $editeurs->links() }}


    {{-- Affiche le formulaire d'ajout d'éditeur --}}
    <p class="mt-5"><a href="{{ route('editeurs.create') }}" class="text-blue-600 underline">Ajouter un éditeur</a></p>

@endsection
