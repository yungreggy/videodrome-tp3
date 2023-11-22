<?php
class Film extends CRUD {
   
    protected $table = 'films';

    protected $primaryKey = 'id';
    protected $fillable = ['titre','annee_de_sortie','genre','pays_d_origine','realisateur_id', 'resume', 'poster_url'];


public function getFilmsByGenreId($genreId) {
    $sql = "SELECT films.* FROM films 
            JOIN genres ON films.genre = genres.id 
            WHERE genres.id = :genreId";
    $stmt = $this->prepare($sql);
    $stmt->bindValue(':genreId', $genreId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function selectByRealisateurId($realisateurId) {
    // Ici on suppose que la table des films a une colonne 'realisateur_id'
    $sql = "SELECT * FROM $this->table WHERE realisateur_id = :realisateurId";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':realisateurId', $realisateurId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function selectByGenre($genreId) {
    $sql = "SELECT * FROM {$this->table} WHERE genre = :genreId";
    $stmt = $this->prepare($sql);
    $stmt->bindValue(':genreId', $genreId);
    $stmt->execute();
    return $stmt->fetchAll();
}



}