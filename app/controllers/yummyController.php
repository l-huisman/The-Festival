<?php

namespace Controllers;

use Services\YummyService;

class YummyController
{
    private $yummyService;

    public function __construct()
    {
        $this->yummyService = new yummyService();
    }
    public function index()
    {
        $restaurantList = $this->yummyService->getRestaurants();
        require __DIR__ . '/../views/yummy/yummyOverview/yummyOverview.php';
    }
    public function restaurant($restaurant_id)
    {
        $restaurant = $this->yummyService->getRestaurantById($restaurant_id);
        $sessionsList = $this->yummyService->getSessions($restaurant_id); 

        require __DIR__ . '/../views/yummy/yummyDetail/yummyDetail.php';
    }
    
    // public function makeReservation($restaurant_id, $session_id, $seats)
    // {
    //     if (isset($_POST['restaurant-reservation'])){
    //         //reservation get 
    //         $this->session_id = htmlspecialchars($_POST['sessionsDropdown']);
    //         $currentSession = $this->yummyService->getSessionById($this->session_id);

    //         $selectedSeats = htmlspecialchars($_POST['seats']);

    //         if($currentSession->getSeats_left() < $selectedSeats){
    //             echo "Not enough seats available";
    //         }
    //         else{
    //             echo "Reservation made";
    //         }
    //     }
    // }

    //Restaurant CRUD
    public function restaurantOverview()
    {
        $restaurantList = $this->yummyService->getAllRestaurants();
        require __DIR__ . '/../views/admin/yummy/restaurantOverview.php';
    }
    
    public function addRestaurant()
    {
        if (isset($_POST['addRestaurant']))
        {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $price_kids = htmlspecialchars($_POST['price_kids']);
            $star_rating = htmlspecialchars($_POST['star_rating']);
            $cuisine = htmlspecialchars($_POST['cuisine']);
            $website = htmlspecialchars($_POST['website']);
            $phonenumber = htmlspecialchars($_POST['phonenumber']);
            $total_seats = htmlspecialchars($_POST['total_seats']);
            $header_image = htmlspecialchars($_POST['header_image']);
            $restaurant_image = htmlspecialchars($_POST['restaurant_image']);
            $menu_image = htmlspecialchars($_POST['menu_image']);
            $streetname = htmlspecialchars($_POST['streetname']);
            $postalcode = htmlspecialchars($_POST['postalcode']);
            $city = htmlspecialchars($_POST['city']);
            $housenumber = htmlspecialchars($_POST['housenumber']);

            $this->yummyService->addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber);
            
            $restaurantList = $this->yummyService->getAllRestaurants();
            header("Location: /yummy/restaurantOverview");
        }
        require __DIR__ . '/../views/admin/yummy/addRestaurant.php';
    }
    public function deleteRestaurant($restaurant_id)
    {
        $this->yummyService->deleteRestaurantbyId($restaurant_id);
        $restaurantList = $this->yummyService->getAllRestaurants();
        header("Location: /yummy/restaurantOverview");
    }
    public function editRestaurant($restaurant_id)
    {
        $_SESSION["editRestaurantId"] = $restaurant_id;
        header("Location: /yummy/updateRestaurant");
    }
    public function updateRestaurant()
    {
        $editRestaurant = $this->yummyService->getRestaurantById($_SESSION["editRestaurantId"]);

        if (isset($_POST['updateRestaurant']))
        {
            $id = $_SESSION["editRestaurantId"];
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $price_kids = htmlspecialchars($_POST['price_kids']);
            $star_rating = htmlspecialchars($_POST['star_rating']);
            $cuisine = htmlspecialchars($_POST['cuisine']);
            $website = htmlspecialchars($_POST['website']);
            $phonenumber = htmlspecialchars($_POST['phonenumber']);
            $total_seats = htmlspecialchars($_POST['total_seats']);
            
            if(htmlspecialchars($_POST['header_image']) != null) 
                $header_image = htmlspecialchars($_POST['header_image']);
            else
                $header_image = $editRestaurant->getHeader_image();
            if(htmlspecialchars($_POST['restaurant_image']) != null)
                $restaurant_image = htmlspecialchars($_POST['restaurant_image']);
            else
                $restaurant_image = $editRestaurant->getRestaurant_image();
            if(htmlspecialchars($_POST['menu_image']) != null)
                $menu_image = htmlspecialchars($_POST['menu_image']);
            else
                $menu_image = $editRestaurant->getMenu_image();
           
            $streetname = htmlspecialchars($_POST['streetname']);
            $postalcode = htmlspecialchars($_POST['postalcode']);
            $city = htmlspecialchars($_POST['city']);
            $housenumber = htmlspecialchars($_POST['housenumber']);

            $this->yummyService->updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber);
            header("Location: /yummy/restaurantOverview");
        }  
        require __DIR__ . '/../views/admin/yummy/editRestaurant.php';
    }

    //Sessions CRUD
    public function sessionOverview()
    {
        $sessionsList = $this->yummyService->getAllSessions();
        require __DIR__ . '/../views/admin/yummy/sessionOverview.php';
    }
    public function deleteSession($session_id)
    {
        $this->yummyService->deleteSessionbyId($session_id);
        $sessionsList = $this->yummyService->getAllSessions();
        header("Location: /yummy/sessionOverview");
    }
    public function addSession()
    {
        $restaurantList = $this->yummyService->getRestaurants();

        if (isset($_POST['addSession']))
        {
            $restaurant_id = htmlspecialchars($_POST['restaurant_id']);
            $date = htmlspecialchars($_POST['dateTime']);
            $duration = htmlspecialchars($_POST['duration']);
            $seats_reserved = 0;
            $this->yummyService->addSession($restaurant_id, $date, $duration, $seats_reserved);
            
            header("Location: /yummy/sessionOverview");
        }
       
        require __DIR__ . '/../views/admin/yummy/addSession.php';
    }
    public function editSession($session_id)
    {
        $_SESSION["editSessionId"] = $session_id;
        header("Location: /yummy/updateSession");
    }
    public function updateSession()
    {
        $editSession = $this->yummyService->getSessionById($_SESSION["editSessionId"]);
    
        if (isset($_POST['updateSession']))
        {
            $id = $_SESSION["editSessionId"];
            $date = htmlspecialchars($_POST['dateTime']);
            $duration = htmlspecialchars($_POST['duration']);
            
            $this->yummyService->updateSession($id, $date, $duration);
            
            header("Location: /yummy/sessionOverview");
        }
        require __DIR__ . '/../views/admin/yummy/editSession.php';
    }
}