<?php

namespace Services;

use Repositories\TourRepository;
use Models\Tour;


class TourService
{

    public $repository;

    public function __construct()
    {
        $this->repository = new TourRepository();
    }
    public function getAllTours()
    {
        $data = $this->repository->getAllTours();
        $tours = [];
       
       foreach ($data as $tour) {
           
            $tours[] = new Tour($tour["tour_id"], $tour['start_location'], $tour['price'], $tour['seats'], $tour['time'], $tour['name'], $tour['language'], $tour['guide_id']); 
            
        }
        
        return $tours;
    }

    public function getDatebyGuide()
    {
        $data = $this->repository->getAllTours();
        
        $tourmap = [];
       foreach ($data as $tour) {
            $tourmap[$tour["name"]][] = $tour["time"];
           
        }
      
        return $tourmap;
    }

    public function getTourByGuideNameAndTime($name, $time)
    {
        $data = $this->repository->getTourbyGuideNameAndTime($name, $time);
        $tour = new Tour($data["tour_id"], $data['start_location'], $data['price'], $data['seats'], $data['time'], $data['name'], $data['language'], $data['guide_id']);
        return $tour;
    }

    public function addTour($start_location, $price, $seats, $time, $guidename, $language)
    {
        
        return $this->repository->addTour($start_location, $price, $seats, $time, $guidename, $language);
    }

    public function getTourbyId($tour_id)
    {
        $data = $this->repository->getTourById($tour_id);
      
        $tour = new Tour($data["tour_id"], $data['start_location'], $data['price'], $data['seats'], $data['time'], $data['name'], $data['language'], $data['guide_id']);
        return $tour;
    }

    public function updateTour($tour_id, $guide_id, $start_location, $price, $seats, $time, $name, $language)
    {
        return $this->repository->updateTour($tour_id, $guide_id, $start_location, $price, $seats, $time, $name, $language);
    }

    public function deleteTour($tour_id)
    {
        return $this->repository->deleteTour($tour_id);
    }

    public function decreaseSeats($tour_id)
    {
        return $this->repository->decreaseSeats($tour_id);
    }

    
    



 
    

   
 

 




}
