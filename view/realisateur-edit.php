{{ include('header.php', {title: 'Modifier le réalisateur'}) }}

<body>
    <main>
    <div class="container">
        <h1>Modifier le réalisateur</h1>
        <form action="{{ path }}realisateur/update/{{ realisateur.id }}" method="post">
          

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ realisateur.prenom }}" required>
            </div>

              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ realisateur.nom }}" required>
            </div>

            <input type="hidden" name="_method" value="PUT"> <!-- Utilisé pour simuler une requête PUT en HTML5 -->
            <button type="submit" class="btn">Mettre à jour</button>
        </form>
    </div>
    </main>
    {{ include('footer.php') }}
</body>

</html>
