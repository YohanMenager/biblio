@extends('admin.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/css_auteur_cre.css') }}">
</head>
<body>
<div class="form-container">
    <h2>Modifier l'auteur</h2>
    <form action="{{ route('auteurs.update', $auteur->id_auteur) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-controll" id="nom" name="nom" value="{{ $auteur->nom }}" required>
        <label for="prenom">Prenom :</label>
        <input type="text" class="form-controll" id="prenom" name="prenom" value="{{ $auteur->prenom }}" required>
    </div>
    <a href="javascript:history.back()" class="back-button">Retour</a>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
</body>
</html>
@endsection
