<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>

<body>

<div>
<h1 class="text-5xl font-serif text-slate-500 m-5 flex justify-center">Ma bibliothèque</h1>

<div class="flex justify-center">
    <p><a href="{{ route('login') }}" class="border border-black p-3 m-5 align-middle w-44">Se connecter</a></p>  
    <p><a href="{{ route('register') }}" class="border border-black p-3 m-5 align-middle w-44">Créer un compte</a></p>  
</div>
      
</div>


</body>

</html>
