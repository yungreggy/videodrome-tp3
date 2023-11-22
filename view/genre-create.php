{{ include('header.php', {title: 'Ajouter un genre'}) }}
<body>
    <main>

 
    <div class="container-playlist-create">
        <h1>Ajouter un nouveau genre</h1>
        <form action="{{ path }}/genre/store" method="post">
            <div class="form-group">
                <label for="nom">Nom du genre</label>
                <input type="text" id="nom" name="nom_genre" required>
            </div>
            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>
    </main>
</body>
</html>
