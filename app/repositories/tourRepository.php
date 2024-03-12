<?php

namespace Repositories;

class TourRepository extends Repository
{
    public function getAllTours()
    {
        $stmt = $this->connection->prepare("SELECT tour_id, start_location, price, seats, time FROM tour");

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

 
 
}