<?php
class Genre extends CRUD {

    protected $table = 'genres';

    protected $primaryKey = 'id';

    protected $fillable = ['nom_genre'];

    // Ajoute cette méthode pour récupérer le nom d'un genre par son ID
    public function getNomGenreById($id) {
        $sql = "SELECT nom_genre FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            return $result['nom_genre'];
        } else {
            error_log("Genre non trouvé pour l'ID: $id");
            return 'Inconnu'; // ou retourne une valeur par défaut si tu préfères
        }
    }

    public function getGenreById($id) {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
    public function getGenreByNom($nomGenre) {
        $sql = "SELECT * FROM $this->table WHERE nom_genre = :nom_genre";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':nom_genre', $nomGenre);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return $result;
        } else {
            error_log("Genre non trouvé pour le nom: $nomGenre");
            return false;
        }
    }

  
    
    
}
