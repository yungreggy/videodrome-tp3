{{ include('header.php', {title: 'Détail du Réalisateur'}) }}

<body>
    <main>
    <div class="container">
        <h1>{{ realisateur.nom }} {{ realisateur.prenom }}</h1>
        
        <h2>Films de ce réalisateur :</h2>
        {% if films|length > 0 %}
            <ul>
                {% for film in films %}
                    <li><a href="{{ path }}/film/show/{{ film.id }}">{{ film.titre }}</a> ({{ film.annee_de_sortie }})</li>
                {% endfor %}
            </ul>
        {% else %}
            <p>Aucun film trouvé pour ce réalisateur.</p>
        {% endif %}

        <a href="{{ path }}/film/create?realisateur_id={{ realisateur.id }}" class="btn">Ajouter un film pour {{ realisateur.nom }} {{ realisateur.prenom }}</a>
    <br>

       
        <a href="{{ path }}realisateur/edit/{{ realisateur.id }}" class="btn">Modifier</a>


    </div>
    </main>
</body>
</html>
