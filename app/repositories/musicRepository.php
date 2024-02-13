<?php

namespace Repositories;

class MusicRepository extends Repository
{
    public function getArtists()
    {
        $sql = "SELECT * FROM artist";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getArtistById($id)
    {
        $sql = "SELECT * FROM artist WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createArtist($name, $description)
    {
        $sql = "INSERT INTO artist (name, description) VALUES(:name, :description)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function updateArtist($id, $name, $description)
    {
        $sql = "UPDATE artist SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function deleteArtist($id)
    {
        $sql = "DELETE FROM artist WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function addSong($artist_id, $name, $song)
    {
        $sql = "INSERT INTO song (artist_id, name, song) VALUES(:artist_id,:name,:song)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':song', $song);
        $stmt->execute();
    }

    public function getSongsByArtistID($artist_id)
    {
        $sql = "SELECT * FROM song WHERE artist_id = :artist_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
