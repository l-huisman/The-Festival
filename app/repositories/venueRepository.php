<?php

namespace Repositories;

class VenueRepository extends Repository
{
    public function getVenues()
    {
        $sql = "SELECT * FROM venue";
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

    public function createVenue($address)
    {
        $sql = "INSERT INTO venue (address) VALUES(:address)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
    }

    public function updateVenue($id, $address)
    {
        $sql = "UPDATE venue SET address = :address WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
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
