<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

@extends('admin.layout')
{{-- Cette ligne étend un fichier de layout nommé layout.blade.php. --}}
@section('content')
{{-- Cette section est où le contenu principal de la page sera inséré. --}}

<div class="form-container">
        <h1 class="table-title" style="margin: -30px -30px 10px;font-size:40px;">Edition d'un ouvrage</h1>
        <form action="{{ route('ouvrages.update', $ouvrage->id_ouvrage) }}" method="post">
        {{-- Ce formulaire enverra une requête POST à la route nommée ouvrages.update avec l'ID de l'ouvrage à mettre à jour. --}}
            @csrf
            {{-- Ceci inclut un jeton CSRF pour la sécurité. --}}
            @method('PUT')
            {{-- Ceci spécifie que la méthode HTTP utilisée est PUT, nécessaire pour les mises à jour dans Laravel. --}}
            <div class="form-group">
                    <label for="titre" style="margin-top:30px"> Titre : </label>
                    <input type="text" class="form-control" id="titre" name="titre"  required value="{{ $ouvrage->titre }}"> </input>
                    {{-- Cette section crée une étiquette et un champ de saisie pour le titre de l'ouvrage, pré-rempli avec le titre actuel de l'ouvrage. --}}

                    <label for="type" style="margin-top:10px"> Type : </label>
                    <select class="form-control" id="type" name="type"  required >
                    {{-- Cet élément select permet à l'utilisateur de choisir le type de l'ouvrage, avec l'option actuelle déjà sélectionnée. --}}
                        <option value="livre" {{ $ouvrage->type == 'livre' ? 'selected' : '' }}>Livre</option>
                        <option value="ebook" {{ $ouvrage->type == 'ebook' ? 'selected' : '' }}>E-book</option>
                        <option value="magazine" {{ $ouvrage->type == 'magazine' ? 'selected' : '' }}>Magazine</option>
                    </select>

                    <label for="auteur" style="margin-top:10px"> Auteurs : </label>
                    <select class="form-control" id="auteur" name="auteur[]" style="margin-top:10px" required multiple>
                        @foreach($auteurs as $auteur)
                            <option value="{{ $auteur->id_auteur }}" {{ $ouvrage->auteurs->contains($auteur->id_auteur) ? 'selected' : '' }}>{{ $auteur->nom }}
                            {{ $auteur->prenom }}</option>
                        @endforeach
                    </select>
                    {{-- Select permet à l'utilisateur de sélectionner plusieurs auteurs pour l'ouvrage, avec les auteurs actuels déjà sélectionnés. --}}

                    <label for="genre" style="margin-top:10px"> Genres : </label>
                    <select class="form-control" id="genre" name="genre[]" style="margin-top:10px" required multiple>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id_genre }}" {{ $ouvrage->genres->contains($genre->id_genre) ? 'selected' : '' }}>{{ $genre->libelle }}</option>
                        @endforeach
                    </select>
                    {{-- Select permet à l'utilisateur de sélectionner plusieurs genres pour l'ouvrage, avec les genres actuels déjà sélectionnés. --}}

                    {{-- Sélection de l'éditeur, choix unique --}}
                    <label for="editeur" style="margin-top:10px"> Editeur : </label>
                    <select class="form-control" id="editeur" name="editeur" required>
                        @foreach($editeurs as $editeur)
                            <option value="{{ $editeur->id_editeur }}" {{ $ouvrage->id_editeur == $editeur->id_editeur ? 'selected' : '' }}>{{ $editeur->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"style="background-color: #007bff;">Mettre à jour</button>
                {{-- Ce bouton soumet le formulaire lorsqu'il est cliqué, mettant à jour l'ouvrage. --}}
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
{{-- Ce script initialise Select2 sur les éléments select des auteurs et des genres, améliorant leur apparence et leur fonctionnalité. --}}
@endsection
