<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Ouvrage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .search-container {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .search-container {
            margin-bottom: 20px;
        }
        .search-container label {
            margin-right: 10px;
        }
        .search-container input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .search-container input[type="text"]:focus {
            outline: none;
            border-color: #007bff; /* Couleur de mise au point */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Effet de mise au point */
        }
    </style>
</head>
<body>
    <div class="search-container">
        <label for="searchTitle">Titre:</label>
        <input type="text" id="searchTitle" onkeyup="search()" placeholder="Rechercher par titre...">
        <br>
        <label for="searchAuthor">Auteur:</label>
        <input type="text" id="searchAuthor" onkeyup="search()" placeholder="Rechercher par admin.auteur...">
        <br>
        <label for="searchGenre">Genre:</label>
        <input type="text" id="searchGenre" onkeyup="search()" placeholder="Rechercher par genre...">
    </div>
    <table id="ouvrageTable">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Editeur</th>
                <th>Auteurs</th>
                <th>Types</th>
                <th>Genres</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ouvrages as $ouvrage)
                <tr>
                    <td>{{ $ouvrage->titre }}</td>
                    <td>{{ $ouvrage->editeurs->libelle }}</td>
                    <td>
                    @foreach($ouvrage->auteurs as $auteur)
                        {{ $auteur->prenom }} {{ $auteur->nom }}
                        @if(!$loop->last)
                        ,
                        @endif
                    @endforeach
                    </td>
                    <td> {{ $ouvrage->type }}</td>
                    <td>
                    @foreach($ouvrage->genres as $genre)
                        {{ $genre->libelle }}
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function search() {
            var inputTitle = document.getElementById("searchTitle").value.toUpperCase();
            var inputAuthor = document.getElementById("searchAuthor").value.toUpperCase();
            var inputGenre = document.getElementById("searchGenre").value.toUpperCase();
            var table = document.getElementById("ouvrageTable");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var titleColumn = rows[i].getElementsByTagName("td")[0];
                var authorColumn = rows[i].getElementsByTagName("td")[2];
                var genreColumn = rows[i].getElementsByTagName("td")[4];

                if (titleColumn && authorColumn && genreColumn) {
                    var titleValue = titleColumn.textContent || titleColumn.innerText;
                    var authorValue = authorColumn.textContent || authorColumn.innerText;
                    var genreValue = genreColumn.textContent || genreColumn.innerText;

                    if (titleValue.toUpperCase().indexOf(inputTitle) > -1 &&
                        authorValue.toUpperCase().indexOf(inputAuthor) > -1 &&
                        genreValue.toUpperCase().indexOf(inputGenre) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
