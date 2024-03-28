<?php

namespace Repositories;

class TourRepository extends Repository
{
    public function getAllTours()
    {
        $stmt = $this->connection->prepare("SELECT t.tour_id, start_location, price, seats, time, g.name, g.language, g.guide_id FROM tour AS t INNER JOIN guide AS g ON t.tour_id = g.tour_id; ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getTourById($tour_id)
    {
        $sql = "SELECT t.tour_id, start_location, price, seats, time, g.name, g.language, g.guide_id 
                FROM tour AS t 
                INNER JOIN guide AS g 
                ON t.tour_id = g.tour_id 
                WHERE t.tour_id = :tour_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function getTourIDbyDate($time)
    {
        $sql = "SELECT tour_id, start_location, price, seats, time FROM tour WHERE time = :time";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':time', $time);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getTourbyGuideNameAndTime($name, $time)
    {
        $sql = "SELECT t.tour_id, start_location, price, seats, time, g.name, g.language, g.guide_id FROM tour AS t INNER JOIN guide AS g ON t.tour_id = g.tour_id WHERE g.name = :name AND t.time = :time";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':time', $time);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateTour($tour_id, $guide_id, $start_location, $price, $seats, $time, $name, $language)
    {
        $stmt = $this->connection->prepare("UPDATE tour SET start_location = :start_location, price = :price, seats = :seats, time = :time WHERE tour_id = :id;
                UPDATE guide SET name = :name, language = :language WHERE guide_id = :guide_id;");
        
        $stmt->bindParam(':start_location', $start_location);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':seats', $seats);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':id', $tour_id);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':guide_id', $guide_id);
        $stmt->execute();
    }
    
    public function deleteTour($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM tour WHERE tour_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $stmt = $this->connection->prepare("DELETE FROM guide WHERE tour_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function addTour($start_location, $price, $seats, $time, $name, $language)
    {
        $this->connection->beginTransaction();

        $stmt = $this->connection->prepare("INSERT INTO tour (start_location, price, seats, time) VALUES (:start_location, :price, :seats, :time)");
        $stmt->bindParam(':start_location', $start_location);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':seats', $seats);
        $stmt->bindParam(':time', $time);
        $stmt->execute();

        // Retrieve the last inserted ID (tour_id)
        $tour_id = $this->connection->lastInsertId();

        $stmt = $this->connection->prepare("INSERT INTO guide (name, language, tour_id) VALUES (:name, :language, :tour_id)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->execute();


        $this->connection->commit();
    }

    public function decreaseSeats($tour_id)
    {
        $sql = "UPDATE tour SET seats = seats - 1 WHERE tour_id = :tour_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->execute();
    }















}