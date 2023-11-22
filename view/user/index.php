{{ include('header.php', {title: 'Liste des utilisateurs'}) }}

<body>
    <div class="container">
        <h1>Utilisateurs</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Courriel</th>
                <th>Privilège</th>
                <th>ID du Privilège</th>
                <th>Actions</th>
            </tr>
            {% for user in users %}
                <tr>
                    <td>{{ user.id }}</td>
                    <td>
                        <a href="{{ path }}admin/show/{{ user.id }}">{{ user.username }}</a>
                    </td>
                    <td>{{ user.email }}</td>
                    <td>
                        <form action="{{ path }}admin/updatePrivilege/{{ user.id }}" method="post">
                            <select name="privilege_id">
                                <option value="1" {% if user.privilege_id == 1 %} selected {% endif %}>Administrateur</option>
                                <option value="2" {% if user.privilege_id == 2 %} selected {% endif %}>Utilisateur</option>
                            </select>
                            <button type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>{{ user.privilege_id }}</td>
                    <td>
                        <a href="{{ path }}user/edit/{{ user.id }}" class="btn">Modifier</a>
                        <a href="{{ path }}user/destroy/{{ user.id }}" class="btn" onclick="return confirm('Confirmez-vous la suppression de cet utilisateur ?');">Supprimer</a>
                    </td>
                </tr>
            {% endfor %}
        </table>
        <a href="{{ path }}admin/create" class="btn">Ajouter</a>
    </div>
</body></html>





