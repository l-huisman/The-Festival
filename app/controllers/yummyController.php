<?php

namespace Controllers;

use Services\YummyService;

class YummyController{
    private $yummyService;
    private $restaurant_id;
    private $session_id;

    public function __construct()
    {
        $this->yummyService = new yummyService();
    }
    public function index()
    {
        $restaurantList = $this->yummyService->getRestaurants();
        require __DIR__ . '/../views/yummy/yummyOverview/yummyOverview.php';
    }
    public function restaurant()
    {
        if (isset($_POST['detail-page'])){
            $this->restaurant_id = htmlspecialchars($_POST['detail-page']);
            $restaurant = $this->yummyService->getRestaurantById($this->restaurant_id);
           
            //sessions
            $sessionsList = $this->yummyService->getSessions($this->restaurant_id);  
        }

        if (isset($_POST['restaurant-reservation'])){
            //reservation
            $this->session_id = htmlspecialchars($_POST['sessionsDropdown']);
            $currentSession = $this->yummyService->getSessionById($this->session_id);

            $selectedSeats = htmlspecialchars($_POST['seats']);

            if($currentSession->getSeats_left() < $selectedSeats){
                echo "Not enough seats available";
            }
            else{
                echo "Reservation made";
            }
        }

        require __DIR__ . '/../views/yummy/yummyDetail/yummyDetail.php';
    }
}