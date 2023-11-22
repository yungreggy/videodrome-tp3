{{ include('header.php', {title: 'Afficher le Genre'}) }}
<body>
    <main>
    <div class="container">
        <h1>{{ genre.nom_genre }}</h1>
        
        <h2>Films de ce genre :</h2>
        <ul>
            {% for film in films %}
            <li><a href="{{ path }}/film/show/{{ film.id }}">{{ film.titre }}</a> ({{ film.annee_de_sortie }})</li>
            {% else %}
                <li>Aucun film pour ce genre.</li>
            {% endfor %}
        </ul>
            <a href="{{ path }}genre/edit/{{ genre.nom_genre }}" class="btn">Modifier le genre</a>
            <br>
    
        <form method="POST" action="{{ path }}genre/destroy/{{ genre.id }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn">Supprimer le genre</button>
        </form>
                
    </main>

    {{ include('footer.php') }}
</body>

</html>
