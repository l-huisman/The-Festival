<?php

namespace Repositories;

class VenueRepository extends Repository
{
    public function getVenues()
    {
        $sql = "SELECT id, name, address FROM venue";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getVenueById($id)
    {
        $sql = "SELECT * FROM venue WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createVenue($name, $address)
    {
        $sql = "INSERT INTO venue (name, address) VALUES (:name, :address)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
    }

    public function updateVenue($id, $name, $address)
    {
        $sql = "UPDATE venue SET name = :name, address = :address WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
    }

    public function deleteVenue($id)
    {
        $sql = "DELETE FROM venue WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
