<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Saisie d'un Utilisateur</h1>
    <form action ='saisie/enreg' method="POST">@csrf
        <label>Nom de l'Utilisateur</label>
        <input type="text" id="nom" name="nom"><br><br>
        <label>Prenom de l'Utilisateur</label>
        <input type="text" id="prenom" name="prenom"><br><br>
        <label>Date de naissance de l'Utilisateur</label>
        <input type="text" id="ddn" name="ddn"><br><br>
        <label>Email de l'Utilisateur</label>
        <input type="text" id="email" name="email"><br><br>
        <label>Mot de passe de l'Utilisateur</label>
        <input type="password" id="mdp" name="mdp"><br><br>
        <label>Adresse de l'Utilisateur<</label>
        <input type="text" id="adresse" name="adresse"><br><br>
        <label>Code postal de l'Utilisateur</label>
        <input type="text" id="cp" name="cp"><br><br>
        <label>Ville de l'Utilisateur</label>
        <input type="text" id="ville" name="ville"><br><br>
        <input type="submit" value="Valider">
    </form> 
</body>
</html>