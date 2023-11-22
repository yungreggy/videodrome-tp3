<?php
class Realisateur extends CRUD
{

    protected $table = 'realisateurs';

    protected $primaryKey = 'id';
    protected $fillable = ['prenom', 'nom'];

    public function getAllExcept($excludedName)
    {
        $sql = "SELECT * FROM {$this->table} WHERE nom != :excludedName";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':excludedName', $excludedName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasFilms($realisateurId)
    {

        $sql = "SELECT COUNT(*) FROM films WHERE realisateur_id = :realisateur_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':realisateur_id', $realisateurId, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

}