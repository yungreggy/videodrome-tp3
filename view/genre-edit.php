{{ include('header.php', {title: 'Modifier le Genre'}) }}
<body>
    <div class="container">
        <h1>Modifier le Genre {{ genre.nom_genre }}</h1>
        <form action="{{ path }}/genre/update/{{ genre.id }}" method="post">
            <div class="form-group">
                <label for="genre_nom">Nom du Genre:</label>
                <input type="text" id="genre_nom" name="genre_nom" value="{{ genre.nom_genre }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>

