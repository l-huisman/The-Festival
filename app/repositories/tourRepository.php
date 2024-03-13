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


    

    public function getTourByGuideAndDate($time, $name)
    {
        $sql = "SELECT t.tour_id, start_location, price, seats, time, g.name, g.language FROM tour AS t INNER JOIN guide AS g WHERE time = :time AND g.name = :guide_name";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':guide_name', $name);
        $stmt->execute();
        return $stmt->fetch();
    }



 

    






 
 
}