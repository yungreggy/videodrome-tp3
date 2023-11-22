{{ include('header.php', {title: 'Liste des réalisateurs'}) }}

<body>
    <main> 

    <section class="container">

        <h1>Liste des réalisateurs</h1>
        <table class="liste-realisateur">
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
    {% for realisateur in realisateurs %}
        {% if realisateur.prenom != '--' and realisateur.nom != '--' %}
            <tr>
                <td class="nom-realisateur"><a href="{{ path }}realisateur/show/{{ realisateur.id }}">{{ realisateur.prenom }} {{ realisateur.nom }}</a></td>
                <td>
                    <a href="{{ path }}realisateur/edit/{{ realisateur.id }}" class="btn">Modifier</a>
                </td>
                <td>
                    <form method="POST" action="{{ path }}realisateur/destroy/{{ realisateur.id }}" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce réalisateur ?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn">Supprimer</button>
                    </form>
                </td>
            </tr>
        {% endif %}
    {% else %}
        <tr>
            <td colspan="3">Aucun réalisateur trouvé.</td>
        </tr>
    {% endfor %}
</tbody>
        </table>
        <a href="{{path}}realisateur/create" class="btn">Ajouter un réalisateur</a>
</section>

</main>

</body>

</html>

