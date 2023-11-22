<?php
RequirePage::model('CRUD');
RequirePage::model('Film');
RequirePage::model('Playlist');
RequirePage::model('Genre');
RequirePage::model('Realisateur');
RequirePage::library('CheckSession');

class ControllerRealisateur extends Controller
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
        $realisateur = new Realisateur();
        $realisateurs = $realisateur->select();
        return Twig::render('realisateur-index.php', ['realisateurs' => $realisateurs]);
    }

    public function show($id)
    {
       
        $realisateur = new Realisateur;
        $film = new Film;
        $realisateurInfo = $realisateur->selectId($id);

        // Si le réalisateur n'existe pas, redirige vers la page 404
        if (!$realisateurInfo) {
            RequirePage::url('error.php');
            return;
        }

        $filmsDuRealisateur = $film->selectByRealisateurId($id);

        return Twig::render('realisateur-show.php', [
            'realisateur' => $realisateurInfo,
            'films' => $filmsDuRealisateur
        ]);
    }

    public function create()
    {

        return Twig::render('realisateur-create.php');
    }

    public function store()
    {

        $realisateur = new Realisateur();

        // Nettoie et valide les données d'entrée
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');

        if (empty($nom) || empty($prenom)) {
            echo "Le nom et le prénom sont requis.";
            return;
        }

        // Prépare les données pour l'insertion
        $data = [
            'nom' => $nom,
            'prenom' => $prenom
        ];

        $result = $realisateur->insert($data);

        if ($result) {

            RequirePage::url('realisateur/index');
        } else {
            echo "Erreur lors de l'ajout du réalisateur.";
        }
    }

    public function edit($id)
    {
        
        $realisateur = new Realisateur;
        $realisateurData = $realisateur->selectId($id);

        if ($realisateurData) {
            return Twig::render('realisateur-edit.php', ['realisateur' => $realisateurData]);
        } else {
            echo "Le réalisateur demandé n'existe pas.";
        }
    }

    public function update($id)
    {
        
        $realisateur = new Realisateur;
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $result = $realisateur->update([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom
        ]);

        if ($result) {
            RequirePage::url('realisateur/show/' . $id);
        } else {
            echo "Erreur lors de la mise à jour du réalisateur.";
        }
    }

    public function destroy($id)
    {

        
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            echo "ID invalide.";
            return;
        }

        $realisateur = new Realisateur();

        if ($realisateur->hasFilms($id)) {
            echo "Des films sont associés à ce réalisateur. Veuillez les supprimer d'abord.";
            return;
        }

        $result = $realisateur->delete($id);

        if ($result) {
            RequirePage::url('realisateur/index');
        } else {
            echo "Erreur lors de la suppression du réalisateur.";
        }
    }

}