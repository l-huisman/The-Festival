<?php

namespace Repositories;

class HistoricRepository extends Repository
{
    public function getAllHistoricEvents()
    {
        $stmt = $this->connection->prepare("SELECT historicevent_id, name, description, path, location FROM historicevent");
        
        $stmt->execute();
      
        return $stmt->fetchAll();
    }

    public function getHistoricEventById($historicevent_id)
    {
        $sql = "SELECT * FROM historicevent WHERE historicevent_id = :historicevent_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':historicevent_id', $historicevent_id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateHistoricEvent($id, $name, $description, $path, $location)
    {

        $sql = "UPDATE historicevent SET name = :name, description = :description, path = :path, location = :location WHERE historicevent_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':path', $path);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteHistoricEvent($id)
    {
        $sql = "DELETE FROM historicevent WHERE historicevent_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function addHistoricEvent($name, $description, $path, $location)
    {
        $sql = "INSERT INTO historicevent (name, description, path, location) VALUES (:name, :description, :path, :location)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':path', $path);
        $stmt->bindParam(':location', $location);
        $stmt->execute();
    }

 
}