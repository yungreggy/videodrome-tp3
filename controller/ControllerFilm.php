<?php

RequirePage::model('CRUD');
RequirePage::model('Film');
RequirePage::model('Playlist');
RequirePage::model('Genre');
RequirePage::model('Realisateur');
RequirePage::library('CheckSession');


class ControllerFilm extends Controller
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


    public function index()
    {
        $filmModel = new Film;
        $genreModel = new Genre;
        $realisateurModel = new Realisateur;
        $noPoster = '/alex/Session%203/prog-web-avance/TP-03/videodrome-tp3/assets/img/poster-template.png';

        $films = $filmModel->select();

        // Vérifier si la liste des films est vide
        if (empty($films)) {
            // Afficher un message d'erreur si aucun film n'est trouvé
            return Twig::render('error.php', ['message' => 'Aucun film disponible.']);
        }

        foreach ($films as &$film) {
            $genre = $genreModel->selectId($film['genre']);
            $film['genre_nom'] = $genre['nom_genre'];

            $realisateur = $realisateurModel->selectId($film['realisateur_id']);
            $film['realisateur'] = $realisateur['nom'] . ' ' . $realisateur['prenom'];
            if (empty($film['poster_local']) && empty($film['poster_url'])) {
                $film['poster_url'] = $noPoster;
            }
        }

        return Twig::render('film-index.php', ['films' => $films]);
    }


    public function create()
    {

        $films = new Film;
        $selectFilms = $films->select();

        $genre = new Genre;
        $selectGenres = $genre->select();

        $realisateur = new Realisateur;
        $selectRealisateurs = $realisateur->select();

        // Récupère l'ID du réalisateur à partir de l'URL s'il est présent
        $realisateur_id = isset($_GET['realisateur_id']) ? $_GET['realisateur_id'] : null;

        return Twig::render('film-create.php', [
            'films' => $selectFilms,
            'genres' => $selectGenres,
            'realisateurs' => $selectRealisateurs,
            'realisateur_id' => $realisateur_id // Passe l'ID du réalisateur à la vue
        ]);
    }


    public function store()
    {

        $film = new Film;
        $filmData = $_POST;
        $filmData['genre'] = intval($filmData['genre']); // Convertis la valeur en entier
        // Ajoute l'ID du réalisateur à $filmData si nécessaire
        $filmId = $film->insert($filmData);

        if ($filmId !== false) {
            RequirePage::url('film/show/' . $filmId);
        } else {
            // Gérer l'erreur d'insertion du film
            echo "Erreur lors de l'ajout du film";
        }
    }


    public function show($id)
    {

        $filmModel = new Film;
        $genreModel = new Genre;
        $realisateurModel = new Realisateur;
        $noPoster = '/alex/Session%203/prog-web-avance/TP-03/videodrome-tp3/assets/img/poster-template.png';


        $film = $filmModel->selectId($id);
        if (!$film) {
            RequirePage::url('home/error/404');
            return;
        }

        $genre = $genreModel->selectId($film['genre']);
        $realisateur = $realisateurModel->selectId($film['realisateur_id']);

        $film['genre_nom'] = $genre ? $genre['nom_genre'] : 'Inconnu';
        $film['realisateur_nom'] = $realisateur ? $realisateur['prenom'] . ' ' . $realisateur['nom'] : 'Inconnu';

        if (empty($film['poster_local']) && empty($film['poster_url'])) {
            $film['poster_url'] = $noPoster; 
        }

        return Twig::render('film-show.php', ['film' => $film]);
    }



    public function edit($id)
    {
    
        $film = new Film;
        $selectId = $film->selectId($id);
        $genre = new Genre;
        $selectGenres = $genre->select('nom_genre');
        $realisateur = new Realisateur; 
        $selectRealisateurs = $realisateur->select('id');


        // Transformer les genres et les réalisateurs en tableaux associatifs pour un accès facile
        $genreMap = [];
        $realisateurMap = [];
        foreach ($selectGenres as $genre) {
            $genreMap[$genre['id']] = $genre['nom_genre'];
        }
        foreach ($selectRealisateurs as $real) {
            $realisateurMap[$real['id']] = $real['prenom'] . ' ' . $real['nom'];
        }

        // Enrichir le film avec le nom du genre et du réalisateur
        if (isset($selectId['id'])) {
            $selectId['nom_genre'] = $genreMap[$selectId['id']] ?? 'Inconnu';
            $selectId['nom_realisateur'] = $realisateurMap[$selectId['realisateur_id']] ?? 'Inconnu';
        }

        return Twig::render('film-edit.php', [
            'films' => $selectId,
            'genres' => $selectGenres,
            'realisateurs' => $selectRealisateurs 
        ]);
    }

    public function update()
    {
        $film = new Film;
        $data = $_POST; 

        if (isset($data['realisateur'])) {
            $data['realisateur_id'] = $data['realisateur'];
            unset($data['realisateur']);
        }

        $film->update($data);

        $updatedFilm = $film->selectId($data['id']);

        RequirePage::url('film/show/' . $_POST['id']);
    }

    public function destroy($filmId)
    {
    
        $filmModel = new Film(); // Ou le nom de ton modèle de film
        $result = $filmModel->delete($filmId);
        if ($result) {

            header('Location: ' . PATH_DIR . 'film/index');
            exit;
        } else {
            $_SESSION['error_message'] = "Le film n'a pas pu être supprimé.";
            header('Location: ' . PATH_DIR . 'error');
            exit;
        }
    }


}



?>
