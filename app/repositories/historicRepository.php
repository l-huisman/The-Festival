<?php

namespace Repositories;

class HistoricRepository extends Repository
{
    public function getAllHistoricEvents()
    {
        $stmt = $this->connection->prepare("SELECT * FROM historicEvent");
        
        $stmt->execute();
      
       
        return $stmt->fetchAll();
    }

    public function getHistoricEventById($id)
    {
        $sql = "SELECT * FROM historicEvent WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
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
        $stmt->bindParam('', $description);
        $stmt->bindParam(':eventDate', $eventDate);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':language', $language);
        $stmt->execute(); 
    
}

    public function deleteHistoricEvent($id)
    {
        $sql = "DELETE FROM historicEvent WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

 
}
