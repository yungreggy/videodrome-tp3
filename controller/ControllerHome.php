<?php

RequirePage::library('CheckSession');
class ControllerHome extends Controller {
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

    public function index(){

        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Invité';
      
        return Twig::render('home.php', ['username' => $username]);;
    }

    public function error($code)
    {
        $errorMessage = $this->getErrorMessage($code);
        return Twig::render('erreur.php', ['message' => $errorMessage]);
    }

    private function getErrorMessage($code) {
        switch ($code) {
            case 404:
                return "Page non trouvée";
            case 500:
                return "Erreur interne du serveur";
            default:
                return "Une erreur inconnue est survenue";
        }
    }

}

?>