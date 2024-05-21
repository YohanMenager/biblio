<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

@extends('admin.layout')
{{-- Cette ligne étend un fichier de layout nommé layout.blade.php. --}}
@section('content')
{{-- Cette section est où le contenu principal de la page sera inséré. --}}
<div class="form-container">
    <h1 class="table-title" style="margin: -30px -30px 10px; font-size:40px;">Ajout d'un ouvrage</h1>
    <form action="{{ route('ouvrages.store') }}" method="post">
    {{-- Ce formulaire enverra une requête POST à la route nommée admin.ouvrages.store lorsqu'il sera soumis. --}}
        @csrf
        {{-- Inclut un jeton CSRF pour la sécurité. --}}
        <div class="form-group">
            {{-- Champ de saisie pour le titre --}}
            <label for="titre" style="margin-top:30px"> Titre : </label>
            <input type="text" class="form-control" id="titre" name="titre" required> </input>

            {{-- Sélection du type d'ouvrage, choix multiple --}}
            <label for="Type" > Type : </label>
            <select class="form-control" id="type" name="type" required>
                <option value="">Sélectionnez un type</option>
                <option value="livre">Livre</option>
                <option value="ebook">E-book</option>
                <option value="magazine">Magazine</option>
            </select>

            {{-- Sélection des auteurs --}}
            <div style="margin-top:10px">
                <label for="auteur" > Auteurs : </label>
                <select class="form-control" id="auteur" name="auteur[]" required multiple>
                    @foreach($auteurs as $auteur)
                        <option value="{{ $auteur->id_auteur }}">{{ $auteur->nom }} {{ $auteur->prenom }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Sélection des genres --}}
            <div style="margin-top:10px">
                <label for="genre" > Genres : </label>
                <select class="form-control" id="genre" name="genre[]" required multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id_genre }}">{{ $genre->libelle }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Sélection de l'éditeur, choix unique --}}
            <label for="editeur" style="margin-top:10px"> Editeur : </label>
            <select class="form-control" id="editeur" name="editeur" required>
                <option >Sélectionnez un éditeur</option>
                @foreach($editeurs as $editeur)
                    <option value="{{ $editeur->id_editeur }}">{{ $editeur->libelle }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #007bff;"> Créer</button>
        {{-- Ce bouton soumet le formulaire lorsqu'il est cliqué. --}}
    </form>
    <a href="javascript:history.back()" class="back-button">Retour</a>
    {{-- Ce lien permet à l'utilisateur de revenir à la page précédente sans soumettre le formulaire. --}}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- Ces lignes incluent jQuery et Select2, un plugin jQuery pour améliorer les éléments select. --}}
<script>
    $(document).ready(function() {
        $('#auteur').select2({
            placeholder: "Sélectionnez un ou plusieurs auteurs"
        });
        $('#genre').select2({
            placeholder: "Sélectionnez un ou plusieurs genres"
        });
    });
</script>
{{-- Ce script initialise Select2 sur les éléments select des auteurs et des genres. --}}
@endsection
