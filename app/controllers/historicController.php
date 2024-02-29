<?php

namespace Controllers;
use Services\HistoricService;

class HistoricController{

    public $historicService;
    

    public function __construct()
    {
        $this->historicService = new HistoricService();

    }

   
    public function index()
    {
        $historic = $this->historicService->getAllHistoricEvents();

        require __DIR__ . '/../views/historic/historicOverview.php';
    }
    public function historicDetail($historicId)
    {
        $historic_current = $this->historicService->getHistoricEventById($historicId);
        require __DIR__ . '/../views/historic/historicDetail.php';
    }
}