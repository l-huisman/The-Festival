<?php

namespace Controllers;
use Services\HistoricService;
use Services\TourService;

class HistoricController{

    public $historicService;
    public $tourService;

    public function __construct()
    {
        $this->historicService = new HistoricService();
        $this->tourService = new TourService();
    }

   
    public function index()
    {
        $historic = $this->historicService->getAllHistoricEvents();

        require __DIR__ . '/../views/historic/historicOverview.php';
    }
    public function historicDetail($historicevent_id)
    {
        $event = $this->historicService->getHistoricEventById($historicevent_id);
        $tour = $this->tourService->getAllTours();
        require __DIR__ . '/../views/historic/historicDetail.php';
    }
}