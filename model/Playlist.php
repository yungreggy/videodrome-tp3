<?php

class Playlist extends CRUD
{

    protected $table = 'playlist';
    protected $primaryKey = 'id';

    protected $fillable = ['nom_playlist', 'description'];


    public function selectAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>