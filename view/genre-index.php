{{ include('header.php', {title: 'Liste des Genres'}) }}

<body>
    <main>
    <div class="container">
        <h1>Genres</h1>
      
        <ul class="liste-genres">
            {% for genre in genres %}
                <li><a href="{{ path }}genre/show/{{ genre.id }}">{{ genre.nom_genre }}</a></li>
            {% else %}
                <li>Aucun genre trouvé.</li>
            {% endfor %}
        </ul>
        <a href="{{ path }}genre/create" class="btn">Ajouter un genre</a>
  
       

</div>



</main>
{{ include('footer.php') }}
</body>
</html>
