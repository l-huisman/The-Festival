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
        
        foreach ($data as $tour) {
            $tours[] = new Tour($tour["tour_id"], $tour['start_location'], $tour['price'], $tour['seats'], $tour['time'], $tour['name'], $tour['language']);
        }
        return $tours;
    }

    public function getTourByGuideAndDate($time, $guide_name)
    {
        return $this->repository->getTourByGuideAndDate($time, $guide_name);
    }  

    

 

    

   
 




}
