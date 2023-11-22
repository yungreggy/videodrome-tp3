<?php

class FilmPlaylist extends CRUD
{

    protected $table = 'films_playlists';
    protected $primaryKey = 'id';



    public function addFilmToPlaylist($filmId, $playlistId)
    {
        $sql = "INSERT INTO {$this->table} (film_id, playlist_id) VALUES (:film_id, :playlist_id)";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':film_id', $filmId);
        $stmt->bindValue(':playlist_id', $playlistId);
        return $stmt->execute();
    }

    public function removeFilmFromPlaylist($filmId, $playlistId)
    {
        $sql = "DELETE FROM {$this->table} WHERE film_id = :film_id AND playlist_id = :playlist_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':film_id', $filmId);
        $stmt->bindValue(':playlist_id', $playlistId);
        return $stmt->execute();
    }

    public function getFilmsByPlaylistId($playlistId)
    {
        $sql = "SELECT film_id FROM {$this->table} WHERE playlist_id = :playlist_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':playlist_id', $playlistId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDetailedFilmsByPlaylistId($playlistId)
    {
        $sql = "SELECT f.*, CONCAT(r.prenom, ' ', r.nom) AS realisateur_nom_complet
            FROM films f 
            INNER JOIN films_playlists fp ON f.id = fp.film_id
            INNER JOIN realisateurs r ON f.realisateur_id = r.id
            WHERE fp.playlist_id = :playlist_id";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(':playlist_id', $playlistId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getPlaylistsByFilmId($filmId)
    {
        $sql = "SELECT playlist_id FROM {$this->table} WHERE film_id = :film_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':film_id', $filmId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public function removeAllFilmsFromPlaylist($playlistId)
    {
        $sql = "DELETE FROM {$this->table} WHERE playlist_id = :playlist_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':playlist_id', $playlistId, PDO::PARAM_INT);
        $stmt->execute();
    }

     public function isFilmInPlaylists($filmId) {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE film_id = :film_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':film_id', $filmId);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count > 0;
    }











}
