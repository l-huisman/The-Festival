<?php

namespace Services;

use Repositories\YummyRepository;

class YummyService {
    private $yummyRepository;

    public function __construct()
    {
        $this->yummyRepository = new YummyRepository();
    }

    public function getRestaurants()
    {
        return $this->yummyRepository->getRestaurants();
    }

    public function getRestaurantById($restaurant_id)
    {
        return $this->yummyRepository->getRestaurantById($restaurant_id);   
    }
    public function getSessions($id)
    {
        return $this->yummyRepository->getSessions($id);
    }
    public function getSessionById($id)
    {
        return $this->yummyRepository->getSessionById($id);
    }
}