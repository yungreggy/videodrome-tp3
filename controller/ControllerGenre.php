<?php

RequirePage::model('CRUD');
RequirePage::model('Film');
RequirePage::model('Playlist');
RequirePage::model('Genre');
RequirePage::library('CheckSession');


class ControllerGenre extends Controller
{
    public function __construct()
    {
        CheckSession::sessionAuth();
        if ($_SESSION['privilege'] != 1 && $_SESSION['privilege'] != 2) {
            RequirePage::url('login');
            exit();
        } else {
            try {
                // Your existing code here

            } catch (\Exception $e) {
                RequirePage::url('erreur.php');
                exit();
            }
        }
    }

    public function index()
    {
       
        $genre = new Genre;
        $select = $genre->select();
        return Twig::render('genre-index.php', ['genres' => $select]);
    }
    // Dans ta méthode show du contrôleur
    public function show($id) {
    
     
        $filmModel = new Film();
        $genreModel = new Genre();
    
        $genre = $genreModel->selectId($id);
        $films = $filmModel->select();
    
        $filmsWithGenre = array_filter($films, function ($film) use ($id) {
            return $film['genre'] == $id;
        });
    
        if (!$genre) {
            RequirePage::url('home/error/404');
            return;
        }
    
        return Twig::render('genre-show.php', ['genre' => $genre, 'films' => $filmsWithGenre]);
    }
    

    public function create()
    {
    
        return Twig::render('genre-create.php'); 
    }


    public function store()
    {
        $genre = new Genre;
        $nomGenre = $_POST['nom_genre']; 
        $genreId = $genre->insert(['nom_genre' => $nomGenre]);

        if ($genreId !== false) {
            RequirePage::url('genre/show/' . $genreId);
        } else {
            echo "Erreur lors de l'ajout du genre";
        }
    }


    public function edit($nomGenre)
    {
     
        $genre = new Genre;

        $genreData = $genre->getGenreByNom($nomGenre);

        if (!$genreData) {
            RequirePage::url('genre/index');
            return;
        }

        return Twig::render('genre-edit.php', ['genre' => $genreData]);
    }



    public function update($id)
    {
        $genre = new Genre;
        $data = [
            'id' => $id,
            'nom_genre' => $_POST['genre_nom'],
        ];

        $result = $genre->update($data);

        if ($result) {
            RequirePage::url('genre/show/' . $id);
        } else {
            echo "Erreur lors de la mise à jour du genre";
        }
    }


    public function destroy($id) {
     
        $filmModel = new Film();
        $genreModel = new Genre();
     
        $films = $filmModel->selectByGenre($id);

        if (!empty($films)) {
            echo "Ce genre est associé à des films et ne peut pas être supprimé. Veuillez d'abord supprimer les films.";
            return;
        }

        $result = $genreModel->delete($id);
        if ($result === true) {
            RequirePage::url('genre/index');
       
        } else {
            echo "Erreur lors de la suppression du genre.";
        }
    }


}