<?php

namespace Repositories;

class SongRepository extends Repository
{
    public function getSongs($artist_id)
    {
        $sql = "SELECT * FROM song WHERE artist_id = :artist_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSongById($id)
    {
        $sql = "SELECT * FROM song WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createSong($artist_id, $name, $song, $cover)
    {
        $sql = "INSERT INTO song (artist_id, name, song, cover) VALUES(:artist_id, :name, :song, :cover)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':song', $song);
        $stmt->bindParam(':cover', $cover);
        $stmt->execute();
    }

    public function updateSong($id, $name, $song, $cover)
    {
        $sql = "UPDATE song SET name = :name, song = :song, cover = :cover WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':song', $song);
        $stmt->bindParam(':cover', $cover);
        $stmt->execute();
    }

    public function deleteSong($id)
    {
        $sql = "DELETE FROM song WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
