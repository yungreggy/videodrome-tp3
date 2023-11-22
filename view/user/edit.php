{{ include('header.php', {title: 'Modifier Utilisateur'}) }}

<body>
    <div class="container-playlist-create">
        <h1>Modifier l'Utilisateur</h1>
        <form action="{{ path }}user/update/{{ user.id }}" method="post">
            <label for="username">Nom d'utilisateur:</label>
            <input
            type="text" id="username" name="username" value="{{ user.username }}" required>

            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" value="{{ user.email }}" required>

            {% if user.privilege_id == 1 %}
                <label for="privilege">Privilège:</label>
                <select name="privilege_id" id="privilege" required>
                    {% for privilege in privileges %}
                        <option value="{{ privilege.id }}" {% if privilege.id==user.privilege_id %} selected {% endif %}>
                            {{ privilege.privilege_level }}
                        </option>
                    {% endfor %}
                </select>
            {% endif %}

            <input type="submit" value="Sauvegarder" class="btn">
        </form>
    </div>
</body>
</html>

