<?php

namespace Services;

use Repositories\TourRepository;
use Models\Historic;
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
        foreach ($data as $tours) {
            $tours[] = new Tour($tours["tour_id"], $tours['date'], $tours['start_location'], $tours['price'], $tours['seats'], $tours['time']);
        }
        return $tours;
    }

 

    

   
 




}
