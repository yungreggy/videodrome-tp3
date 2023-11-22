{{ include('header.php', { title: 'Modifier la Playlist' }) }}

<main class="container">
    <h1>Modifier la Playlist</h1>
    <form action="{{ path }}playlist/update/{{ playlist.id }}" method="post">
        <div class="form-group">
            <label for="nom_playlist">Nom de la Playlist</label>
            <input type="text" id="nom_playlist" name="nom_playlist" value="{{ playlist.nom_playlist }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ playlist.description }}</textarea>
        </div>

        <div class="form-group">
            <label for="films">Ajouter des Films</label>
            <select id="films" name="films[]" multiple>
                {% for film in all_films %}
                    <option value="{{ film.id }}" {% if film.id in playlist_films_ids %} selected {% endif %}>
                        {{ film.titre }}
                    </option>
                {% endfor %}
            </select>
            <small>Maintiens Ctrl ou Cmd pour sélectionner plusieurs films.</small>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</main>

{{ include('footer.php') }}




