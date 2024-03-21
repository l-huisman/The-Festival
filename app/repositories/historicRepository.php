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


    public function createHistoricEvent($name, $description, $eventDate, $location, $language)
    {
        $sql = "INSERT INTO historicEvent (name, description, eventDate, location, language) VALUES(:name, :description, :eventDate, :location, :language)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':eventDate', $eventDate);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':language', $language);
        $stmt->execute();
    }

    public function updateHistoricEvent($id, $name, $description, $eventDate, $location, $language)
    {
        $sql = "UPDATE historicEvent SET name = :name, description = :description, eventDate = :eventDate, location = :location, language = :language WHERE id = :id";  
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':eventDate', $eventDate);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':language', $language);
        $stmt->execute(); 
    
}

    public function deleteHistoricEvent($id)
    {
        $sql = "DELETE FROM historicevent WHERE historicevent_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

 
}