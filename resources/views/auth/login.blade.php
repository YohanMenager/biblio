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
        <h1 class="mb-2">Connexion</h1>

        <form action="{{ route('authenticate') }}" method="post" class="flex flex-col w-80">
            @csrf
            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" class="border border-black p-2 mb-5">
            @error('email')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="border border-black p-2 mb-5">
            @error('password')
                <span class="text-red-500 mb-5">{{ $message }}</span>
            @enderror

            <button type="submit" class="border border-black p-3">Se connecter</button>
        </form>
    </div>

</body>

</html>
