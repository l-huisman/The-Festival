<?php

namespace Controllers;
use Services\HistoricService;
use Services\ShoppingcartService;
use Services\TourService;
use Symfony\Component\DependencyInjection\Attribute\When;

class HistoricController{

    public $historicService;
    public $tourService;

    public $shoppingcartService;

    public function __construct()
    {
        $this->historicService = new HistoricService();
        $this->tourService = new TourService();
        $this->shoppingcartService = new ShoppingcartService();
        
    }

    public function makeTourTicket(){
       
        $tourTime = htmlspecialchars($_POST['tourTime']);
        $guide = htmlspecialchars($_POST['guide']);
        $tourguide = $this->tourService->getTourbyGuideNameAndTime($guide, $tourTime);
        $this->shoppingcartService->saveTourinTicketSession($tourguide->getTour());
        header("Location: /shoppingcart");
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

    public function addHistoricEvent()
    {
        if (isset($_POST['addHistoricEvent']))
        {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $path = htmlspecialchars($_POST['path']);
            $location = htmlspecialchars($_POST['location']);
            $this->historicService->addHistoricEvent($name, $description, $path, $location);
            header("Location: /historic/historyOverview");
        }
        
        require __DIR__ . '/../views/admin/history/addHistoricEvent.php';
    }

    public function tourOverview()
    {
        $tour = $this->tourService->getAllTours();
        require __DIR__ . '/../views/admin/history/tourOverview.php';
    }

    public function addTour()
    {
        if (isset($_POST['addTour']))
        {
           $startlocation = htmlspecialchars($_POST['startlocation']);
           $price = htmlspecialchars($_POST['price']);
           $seats = htmlspecialchars($_POST['seats']);
           $time = htmlspecialchars($_POST['time']);
           $guidename = htmlspecialchars($_POST['guide']);
           $language = htmlspecialchars($_POST['language']);

            $this->tourService->addTour($startlocation, $price, $seats, $time, $guidename, $language);
            
            header("Location: /historic/tourOverview");
        }
        require __DIR__ . '/../views/admin/history/addTour.php';
    }

    public function editTour()
    {
        $tour_id = htmlspecialchars($_GET['id']);
     
        $tour = $this->tourService->getTourById($tour_id);

        require __DIR__ . '/../views/admin/history/editTour.php';
    }

    public function updateTour()
    {
            $tour_id = htmlspecialchars($_POST['tour_id']);
            $guide_id = htmlspecialchars($_POST['guide_id']);
            $startlocation = htmlspecialchars($_POST['startlocation']);
            $price = htmlspecialchars($_POST['price']);
            $seats = htmlspecialchars($_POST['seats']);
            $time = htmlspecialchars($_POST['time']);
            $guidename = htmlspecialchars($_POST['guide']);
            $language = htmlspecialchars($_POST['language']);
            $this->tourService->updateTour($tour_id, $guide_id, $startlocation, $price, $seats, $time, $guidename, $language);
            header("Location: /historic/tourOverview");
        
    }
    public function deleteTour($tour_id)
    {
        $this->tourService->deleteTour($tour_id);
        header("Location: /historic/tourOverview");
    }

}