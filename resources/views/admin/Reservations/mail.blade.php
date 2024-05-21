<!-- resources/views/emails/test.blade.php -->

<!DOCTYPE html>

<html>

<head>

    <title>Livre prêt</title>

</head>

<body>

    <h1>Votre livre est prêt !</h1>

    <p>Bonjour, {{$user}}.</p>
    <p>Le livre que vous avez commandé, {{$ouvrage}} vous attend à la bibliothèque.</p>

</body>

</html>