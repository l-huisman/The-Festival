<?php

namespace Controllers;
use Services\HistoricService;
use Services\TourService;
use Symfony\Component\DependencyInjection\Attribute\When;

class HistoricController{

    public $historicService;
    public $tourService;

    public function __construct()
    {
        $this->historicService = new HistoricService();
        $this->tourService = new TourService();
        
    }

    public function test(){
       
        $tourTime = htmlspecialchars($_POST['tourTime']);
        $guide = htmlspecialchars($_POST['guide']);

        var_dump($tourTime);
        var_dump($guide);
        $tourguide = $this->tourService->getTourbyGuideNameAndTime($guide, $tourTime);

        
  
        print_r($tourguide);
        
    

    }   

   
    public function index()
    {
        $historic = $this->historicService->getAllHistoricEvents();

        require __DIR__ . '/../views/historic/historicOverview.php';
    }

    public function historyOverview()
    {
        $historic_overview = $this->historicService->getAllHistoricEvents();
        require __DIR__ . '/../views/admin/history/historyeventsOverview.php';
    }

    public function editHistoricEvent()
    {
        $historicevent_id = htmlspecialchars($_GET['id']);
        $event = $this->historicService->getHistoricEventById($historicevent_id);
        require __DIR__ . '/../views/admin/history/editHistoricEvent.php';
    }

    public function deleteHistoricEvent($historicevent_id)
    {
        $this->historicService->deleteHistoricEvent($historicevent_id);
        header("Location: /historic/historyOverview");
    }

    public function updateHistoricEvent()
    {   
        $historicevent_id = htmlspecialchars($_POST['historicevent_id']);
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $path = htmlspecialchars($_POST['path']);
        $location = htmlspecialchars($_POST['location']);
        $this->historicService->UpdateHistoricEvent($historicevent_id, $name, $description, $path, $location);
        header("Location: /historic/historyOverview");

    }
    public function historicDetail($historicevent_id)
    {
        $event = $this->historicService->getHistoricEventById($historicevent_id);
        $tour = $this->tourService->getAllTours();
        $tourdate = $this->tourService->getDatebyGuide();
        require __DIR__ . '/../views/historic/historicDetail.php';
    }
}