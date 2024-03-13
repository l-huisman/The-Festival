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
            $tours[] = new Tour($tour["tour_id"], $tour['start_location'], $tour['price'], $tour['seats'], $tour['time'], $tour['name'], $tour['language']);
        }
        return $tours;
    }

    public function getTourByGuideNameAndTime($name, $time)
    {
        $data = $this->repository->getTourbyGuideNameAndTime($name, $time);
        $tour = new Tour($data["tour_id"], $data['start_location'], $data['price'], $data['seats'], $data['time'], $data['name'], $data['language']);
        return $tour;
    }

 
    

   
 

 




}
