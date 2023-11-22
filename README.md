

# Vidédrôme - Projet de Programmation Web Avancée
Alexandre Grégoire e2395236

https://github.com/yungreggy/videodrome-tp3

sur webdev:
BD: e2395236
username: e2395236
pw: Ey64oDuRuznu8EheWRf4
url:https://e2395236.webdev.cmaisonneuve.qc.ca/videodrome-tp3

username: admin01
Pw: admin1234

Username: admin02
Pw:admin1234

Username: greggy909
Pw: allo12345

## Informations sur le cours

- **Cours**: Programmation Web Avancée
- **Code du cours**: 582-31B-MA
- **Professeur**: Marcos Sanches
- **Établissement**: COLLÈGE DE MAISONNEUVE

## Introduction

L'application "Ma Vidéothèque" est un système de gestion de films et de playlists développé en PHP orienté objet et utilisant une base de données MySQL. L'application permet aux utilisateurs de créer, modifier, supprimer et afficher des informations sur les films, les genres, les réalisateurs et les playlists.

## Base de Données

- **Nom de la base de données**: videodrome
- **Tables principales**: Films, Genres, Réalisateurs, Playlists

## Fonctionnalités

1. **Gestion des Films**: Ajouter, modifier, supprimer et afficher des films.
2. **Gestion des Genres**: Ajouter, modifier, supprimer et afficher des genres.
3. **Gestion des Réalisateurs**: Ajouter, modifier, supprimer et afficher des réalisateurs.
4. **Gestion des Playlists**: Créer, modifier, supprimer et afficher des playlists de films.

## Diagramme Entité-Relation

Le système comprend quatre entités principales : Films, Genres, Réalisateurs, et Playlists.

### Relations

- Un film appartient à un seul genre mais un genre peut avoir plusieurs films.
- Un film peut avoir un seul réalisateur mais un réalisateur peut réaliser plusieurs films.
- Une playlist peut contenir plusieurs films et un film peut appartenir à plusieurs playlists.

## Rôles et Permissions

### Administrateurs
Les administrateurs ont un accès complet au système et peuvent effectuer les actions suivantes :
- **Gérer tous les aspects des Films, Genres, Réalisateurs, et Playlists**.
- **Accéder et modifier toutes les données**.
- **Créer et gérer des comptes utilisateurs et administrateurs**.
- **Modifier les privilèges des utilisateurs**.
- **Accéder au journal de bord pour suivre les activités des utilisateurs**.
- **Consulter l'index complet des utilisateurs**.

### Utilisateurs
Les utilisateurs réguliers ont un accès limité et peuvent effectuer les actions suivantes :
- **Voir et interagir avec les Films, Genres, Réalisateurs, et Playlists**.
- **Créer et gérer leurs propres Playlists**.
- **Modifier leur profil et leurs préférences**.

## Technologies Utilisées
- **Front-end** : HTML, CSS, JavaScript
- **Back-end** : PHP, SQL
- **Framework** : [Nom du Framework]
- **Base de Données** : MySQL

## Conclusion
Ce projet vise à offrir une solution complète pour la gestion de vidéothèque, en permettant une interaction dynamique et personnalisée pour les utilisateurs, tout en fournissant aux administrateurs les outils nécessaires pour une gestion efficace.
