<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>

<body>

    <div class="ml-5">
        <h1 class="mb-2">Inscription</h1>

        <form action="{{ route('store') }}" method="post" class="flex flex-col w-80">
            @csrf

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="border border-black p-2 mb-5">
            @error('nom')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="border border-black p-2 mb-5">
            @error('prenom')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" class="border border-black p-2 mb-5">
            @error('date_naissance')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" class="border border-black p-2 mb-5">
            @error('email')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="border border-black p-2 mb-5">
            @error('adresse')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="code_postal">Code postal</label>
            <input type="number" name="code_postal" id="code_postal" class="border border-black p-2 mb-5">
            @error('email')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="border border-black p-2 mb-5">
            @error('email')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="border border-black p-2 mb-5">
            @error('password')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="password_confirmation">Confirmez votre mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="border border-black p-2 mb-5">
            @error('password')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <button type="submit" class="border border-black p-3">S'inscrire</button>
        </form>
    </div>

</body>

</html>

