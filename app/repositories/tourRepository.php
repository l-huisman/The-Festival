<?php

namespace Repositories;

class TourRepository extends Repository
{
    public function getAllTours()
    {
        $stmt = $this->connection->prepare("SELECT t.tour_id, start_location, price, seats, time, g.name, g.language FROM tour AS t INNER JOIN guide AS g ON t.tour_id = g.tour_id; ");


        $stmt->execute();


        return $stmt->fetchAll();
    }

    public function getTourById($tour_id)
    {
        $sql = "SELECT tour_id, start_location, price, seats, time FROM tour WHERE tour_id = :tour_id";
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

 

    






 
 
}