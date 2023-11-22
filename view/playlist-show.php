{{ include('header.php', { title: 'Détails de la Playlist' }) }}

<main class="container">
    <h1>{{ playlist.nom_playlist }}</h1>
    <p>{{ playlist.description }}</p>

    {% if films|length > 0 %}
        <table class="table">
            <thead>
                <tr>
                    <th>Titre du film</th>
                    <th>Année</th>
                    <th>Réalisateur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for film in films %}
                    <tr>
                        <td>{{ film.titre }}</td>
                        <td>{{ film.annee_de_sortie }}</td>
                        <td>{{ film.realisateur_nom_complet }}</td>
                        <td>
                            <a href="{{ path }}film/show/{{ film.id }}" class="btn btn-info">Voir</a>

                            <a href="{{ path }}playlist/removeFilm/{{ playlistId }}/{{ film.id }}" class="btn btn-danger">X</a>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>

        </table>
    {% else %}
        <p>Cette playlist ne contient aucun film pour le moment.</p>
    {% endif %}

    <a href="{{ path }}playlist/edit/{{ playlist.id }}" class="btn btn-warning">Modifier</a>
    <form action="{{ path }}playlist/destroy/{{ playlist.id }}" method="post" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cette playlist ?');" style="display: inline;">
        <input type="hidden" name="_method" value="DELETE">
           <br>
        <button type="submit" class="btn btn-danger">Supprimer la Playlist</button>
    </form>
</main>

{{ include('footer.php') }}

