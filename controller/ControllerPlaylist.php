<?php

RequirePage::model('CRUD');
RequirePage::model('Film');
RequirePage::model('Playlist');
RequirePage::model('Genre');
RequirePage::model('Realisateur');
RequirePage::model('FilmPlaylist');
RequirePage::library('CheckSession');


class ControllerPlaylist extends Controller
{
    public function __construct()
    {
        CheckSession::sessionAuth();
        if ($_SESSION['privilege'] != 1 && $_SESSION['privilege'] != 2) {
            RequirePage::url('login');
            exit();
        } else {
            try {

            } catch (\Exception $e) {
                RequirePage::url('erreur.php');
                exit();
            }
        }
    }

    // Affiche la liste des playlists
    public function index()
    {
    
        $playlistModel = new Playlist();
        $playlists = $playlistModel->select();
        return Twig::render('playlist-index.php', ['playlists' => $playlists]);
    }


   
    public function create()
    {

        return Twig::render('playlist-create.php', []);
    }


    public function store()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_playlist = $_POST['nom_playlist'] ?? '';
            $description = $_POST['description'] ?? '';

            $playlistModel = new Playlist();
            $result = $playlistModel->insert([
                'nom_playlist' => $nom_playlist,
                'description' => $description
            ]);

            if ($result) {
                RequirePage::url('playlist/index');
            } else {
              
            }
        }
    }


    public function show($playlistId)
    {
   
        $filmPlaylist = new FilmPlaylist();
        $playlistModel = new Playlist();
        $playlist = $playlistModel->selectId($playlistId);

        $films = $filmPlaylist->getDetailedFilmsByPlaylistId($playlistId);

        // Passe $playlist et $films à la vue pour affichage
        return Twig::render('playlist-show.php', [
            'playlist' => $playlist,
            'films' => $films,
            'path' => PATH_DIR 
        ]);
    }


    public function edit($id)
    {
        $playlistModel = new Playlist();
        $playlist = $playlistModel->selectId($id); 

        if (!$playlist) {
          
            echo "Playlist non trouvée.";
            return;
        }

        $filmModel = new Film(); 
        $all_films = $filmModel->select(); 

        $filmPlaylistModel = new FilmPlaylist();
        $playlist_films = $filmPlaylistModel->getFilmsByPlaylistId($id); 

        $playlist_films_ids = array_map(function ($film) {
            return $film['film_id'];
        }, $playlist_films);

        echo Twig::render('playlist-edit.php', [
            'playlist' => $playlist,
            'all_films' => $all_films,
            'playlist_films_ids' => $playlist_films_ids
        ]);
    }
    public function update($id)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_playlist = $_POST['nom_playlist'] ?? '';
            $description = $_POST['description'] ?? '';
            $films = $_POST['films'] ?? []; 
        
            $playlistModel = new Playlist();
            $result = $playlistModel->update([
                'nom_playlist' => $nom_playlist,
                'description' => $description,
                'id' => $id 
            ]);

            if ($result) {
                $filmPlaylistModel = new FilmPlaylist();

                // Récupère la liste actuelle des films dans la playlist
                $currentFilms = $filmPlaylistModel->getFilmsByPlaylistId($id);

                // Trouve les films à supprimer
                $filmsToDelete = array_diff(array_column($currentFilms, 'film_id'), $films);

                // Trouve les films à ajouter
                $filmsToAdd = array_diff($films, array_column($currentFilms, 'film_id'));

                // Supprime les films non désirés
                foreach ($filmsToDelete as $filmId) {
                    $filmPlaylistModel->removeFilmFromPlaylist($filmId, $id);
                }

                // Ajoute les nouveaux films
                foreach ($filmsToAdd as $filmId) {
                    $filmPlaylistModel->addFilmToPlaylist($filmId, $id);
                }

                // Redirection vers la liste des playlists ou la page de succès
                RequirePage::url('playlist/show/' . $id);
                exit;
            } else {
    
                header('Location: /error.php');
                exit;
            }
        }
    }
    public function removeFilm($filmId)
    {
       
        $filmPlaylist = new FilmPlaylist();
        $playlistIds = $filmPlaylist->getPlaylistsByFilmId($filmId);

        $errors = [];
        foreach ($playlistIds as $playlistId) {
            $result = $filmPlaylist->removeFilmFromPlaylist($filmId, $playlistId);
            if (!$result) {
                // Gère l'erreur si le film n'a pas pu être retiré de la playlist
                $errors[] = "Problème lors de la suppression du film avec ID $filmId de la playlist avec ID $playlistId";
            }
        }

        if (empty($errors)) {
            // Redirige vers une page de succès ou vers la première playlist mise à jour si tu as plusieurs playlists
            RequirePage::url('playlist/show/' . $playlistIds[0]);
        } else {
            // Affiche les erreurs
            echo implode("<br>", $errors);
        }
    }


    public function destroy($id)
    {
       
        // Conversion de $id en entier pour éviter les injections SQL
        $id = (int) $id;

        $playlistModel = new Playlist();

        // Création d'une instance de FilmPlaylist pour gérer la table de jointure
        $filmPlaylistModel = new FilmPlaylist();

        // Suppression des films associés à la playlist
        $filmPlaylistModel->removeAllFilmsFromPlaylist($id);

        // Tentative de suppression de la playlist après avoir supprimé les associations
        $result = $playlistModel->delete($id);

        if ($result) {
            // Redirection vers la liste des playlists avec un message de succès
            RequirePage::url('playlist/index?message=Playlist supprimée avec succès');
        } else {
            // Gestion des erreurs
            echo "Il y a eu un problème lors de la suppression de la playlist.";
        }
    }



}






