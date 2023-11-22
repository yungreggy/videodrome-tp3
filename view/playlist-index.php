{{ include('header.php', { title: 'Liste des playlists' }) }}

<main class="container">
    <h1>Liste des Playlists</h1>
    <a href="{{ path }}playlist/create" class="btn btn-primary">Créer une nouvelle playlist</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom de la playlist</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {% for playlist in playlists %}
                <tr>
                    <td>{{ playlist.nom_playlist }}</td>
                    <td>{{ playlist.description }}</td>
                    <td>
                        <a href="{{ path }}playlist/show/{{ playlist.id }}" class="btn btn-info">Voir</a>
                        <a href="{{ path }}playlist/edit/{{ playlist.id }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ path }}playlist/destroy/{{ playlist.id }}" method="post" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cette playlist ?');" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan="3">Aucune playlist trouvée.</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
</main>

{{ include('footer.php') }}




