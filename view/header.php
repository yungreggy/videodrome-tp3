<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{path}}assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<header>

    <nav>
        <ul>
            <li> <img src="{{path}}assets/img/logo.svg" alt="logo" class="logo"></li>
            <li><a href="{{path}}">Accueil</a></li>
            <li>
                <a href="{{path}}film/index">Films</a>
                <ul>
                    <li><a href="{{path}}film/create" class="sous-menu">Ajouter un film</a></li>
                </ul>
            </li>
            <li>
                <a href="{{path}}genre/index">Genres</a>
                <ul>
                    <li><a href="{{path}}genre/create" class="sous-menu">Ajouter un genre</a></li>
                </ul>
            </li>
            <li>
                <a href="{{path}}realisateur/index">Réalisateurs</a>
                <ul>
                    <li><a href="{{path}}realisateur/create" class="sous-menu">Ajouter un réalisateur</a></li>
                </ul>
            </li>
            <li class="sous-menu">
                <a href="{{path}}playlist/index">Playlists</a>
                <ul>
                    <li><a href="{{path}}playlist/create" class="sous-menu">Créer une playlist</a></li>
                </ul>
            </li>
        </ul>

        <ul>
            <li>
                {% if session.user_id is defined %}
                {% if session.privilege == 1 %}
                <!-- Admin est connecté -->
                <a href="{{ path }}admin/show/{{ session.user_id }}">
                    {% else %}
                    <!-- Utilisateur normal est connecté -->
                    <a href="{{ path }}user/show/{{ session.user_id }}">
                        {% endif %}
                        {% if session.profile_photo %}
                        <img src="{{ path }}{{ session.profile_photo }}" alt="Photo de profil" class="profile-pic-nav">
                        {% else %}
                        <i class="fas fa-user"></i>
                        {% endif %}
                        {{ session.username }}
                    </a>
                    {% else %}
                    <!-- Utilisateur non connecté -->
                    <a href="{{ path }}user/create">Inscription</a>
                    {% endif %}
            </li>
            <li>
                {% if session.privilege == 1 %}
                <a href="{{ path }}log/index">Journal de Bord</a>
                {% endif %}
            </li>
            <li>
                {% if session.privilege == 1 %}
                <a href="{{ path }}user/index">Utilisateurs</a>
                {% endif %}
            </li>

            <li>
                {% if session.user_id is defined %}
                <!-- Utilisateur connecté -->
                <a href="{{ path }}login/logout">Logout</a>
                {% else %}
                <!-- Utilisateur non connecté -->
                <a href="{{ path }}login">Login</a>
                {% endif %}

            </li>
        </ul>
    </nav>
</header>

