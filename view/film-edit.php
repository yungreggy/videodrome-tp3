{{ include('header.php', {title: 'Modifier un film'}) }}
<body>
    <main>

 
    <div class="container">
    <h1>Modifier le film <span style="color: limegreen;">{{ films.titre }}</span></h1>

        <form action="{{ path }}film/update" method="post">
            <input type="hidden" name="id" value="{{ films.id }}">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text"  name="titre" value="{{ films.titre }}" required>
            </div>
            <div class="form-group">
                <label for="annee_de_sortie">Année de sortie</label>
                <input type="number" id="annee_de_sortie" name="annee_de_sortie" value="{{ films.annee_de_sortie }}" required>
            </div>
            <div class="form-group">
    <label for="realisateur">Réalisateur</label>
    <select id="realisateur" name="realisateur" required>
        {% for realisateur in realisateurs %}
            <option value="{{ realisateur.id }}" {% if realisateur.id == films.realisateur_id %}selected{% endif %}>{{ realisateur.prenom }} {{ realisateur.nom }}</option>
        {% endfor %}
    </select>
</div>
<div class="form-group">
    <label for="pays_d_origine">Pays d'origine</label>
    <select id="pays_d_origine" name="pays_d_origine" class="form-control">
        <option value="États-Unis" {% if film.pays_d_origine == 'États-Unis' %}selected{% endif %}>États-Unis</option>
        <option value="Afrique du Sud" {% if film.pays_d_origine == 'Afrique du Sud' %}selected{% endif %}>Afrique du Sud</option>
        <option value="Allemagne" {% if film.pays_d_origine == 'Allemagne' %}selected{% endif %}>Allemagne</option>
        <option value="Argentine" {% if film.pays_d_origine == 'Argentine' %}selected{% endif %}>Argentine</option>
        <option value="Australie" {% if film.pays_d_origine == 'Australie' %}selected{% endif %}>Australie</option>
        <option value="Autriche" {% if film.pays_d_origine == 'Autriche' %}selected{% endif %}>Autriche</option>
        <option value="Belgique" {% if film.pays_d_origine == 'Belgique' %}selected{% endif %}>Belgique</option>
        <option value="Brésil" {% if film.pays_d_origine == 'Brésil' %}selected{% endif %}>Brésil</option>
        <option value="Canada" {% if film.pays_d_origine == 'Canada' %}selected{% endif %}>Canada</option>
        <option value="Chine" {% if film.pays_d_origine == 'Chine' %}selected{% endif %}>Chine</option>
        <option value="Corée du Sud" {% if film.pays_d_origine == 'Corée du Sud' %}selected{% endif %}>Corée du Sud</option>
        <option value="Danemark" {% if film.pays_d_origine == 'Danemark' %}selected{% endif %}>Danemark</option>
        <option value="Espagne" {% if film.pays_d_origine == 'Espagne' %}selected{% endif %}>Espagne</option>
        <option value="Égypte" {% if film.pays_d_origine == 'Égypte' %}selected{% endif %}>Égypte</option>
        <option value="France" {% if film.pays_d_origine == 'France' %}selected{% endif %}>France</option>
        <option value="Grèce" {% if film.pays_d_origine == 'Grèce' %}selected{% endif %}>Grèce</option>
        <option value="Hong Kong" {% if film.pays_d_origine == 'Hong Kong' %}selected{% endif %}>Hong Kong</option>
        <option value="Inde" {% if film.pays_d_origine == 'Inde' %}selected{% endif %}>Inde</option>
        <option value="Irlande" {% if film.pays_d_origine == 'Irlande' %}selected{% endif %}>Irlande</option>
        <option value="Italie" {% if film.pays_d_origine == 'Italie' %}selected{% endif %}>Italie</option>
        <option value="Japon" {% if film.pays_d_origine == 'Japon' %}selected{% endif %}>Japon</option>
        <option value="Mexique" {% if film.pays_d_origine == 'Mexique' %}selected{% endif %}>Mexique</option>
        <option value="Norvège" {% if film.pays_d_origine == 'Norvège' %}selected{% endif %}>Norvège</option>
        <option value="Nouvelle-Zélande" {% if film.pays_d_origine == 'Nouvelle-Zélande' %}selected{% endif %}>Nouvelle-Zélande</option>
        <option value="Pays-Bas" {% if film.pays_d_origine == 'Pays-Bas' %}selected{% endif %}>Pays-Bas</option>
        <option value="Pologne" {% if film.pays_d_origine == 'Pologne' %}selected{% endif %}>Pologne</option>
        <option value="Portugal" {% if film.pays_d_origine == 'Portugal' %}selected{% endif %}>Portugal</option>
        <option value="Royaume-Uni" {% if film.pays_d_origine == 'Royaume-Uni' %}selected{% endif %}>Royaume-Uni</option>
        <option value="Russie" {% if film.pays_d_origine == 'Russie' %}selected{% endif %}>Russie</option>
        <option value="Suède" {% if film.pays_d_origine == 'Suède' %}selected{% endif %}>Suède</option>
        <option value="Suisse" {% if film.pays_d_origine == 'Suisse' %}selected{% endif %}>Suisse</option>
        <option value="Thaïlande" {% if film.pays_d_origine == 'Thaïlande' %}selected{% endif %}>Thaïlande</option>
        <option value="Turquie" {% if film.pays_d_origine == 'Turquie' %}selected{% endif %}>Turquie</option>
        <!-- Continuez avec les autres pays populaires ici -->
    </select>
</div>


            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    {% for genre in genres %}
                        <option value="{{ genre.id }}" {% if genre.id == films.genre %}selected{% endif %}>{{ genre.nom_genre }}</option>
                    {% endfor %}
                </select>
            </div>
            <div class="form-group">
                <label for="resume">Résumé</label>
                <textarea id="resume" name="resume">{{ films.resume }}</textarea>
            </div>
            <div class="form-group">
                <label for="poster">Poster (URL)</label>
                <input type="text" id="poster" name="poster_url" value="{{ films.poster_url }}">
            </div>
            <button type="submit" class="btn">Mettre à jour</button>
        </form>
    </div>
    </main>

{{ include('footer.php') }}

</body>
</html>



