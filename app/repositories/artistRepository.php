<?php

namespace Repositories;

class ArtistRepository extends Repository
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

    public function createArtist($name, $description, $banner, $pictogram)
    {
        $sql = "INSERT INTO artist (name, description, banner, pictogram) VALUES(:name, :description, :banner, :pictogram)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':banner', $banner);
        $stmt->bindParam(':pictogram', $pictogram);
        $stmt->execute();
    }

    public function updateArtist($id, $name, $description, $banner, $pictogram)
    {
        $sql = "UPDATE artist SET name = :name, description = :description, banner = :banner, pictogram = :pictogram WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':banner', $banner);
        $stmt->bindParam(':pictogram', $pictogram);
        $stmt->execute();
    }

    public function deleteArtist($id)
    {
        $sql = "DELETE FROM artist WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
