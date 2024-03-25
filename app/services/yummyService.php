<?php

namespace Services;

use Repositories\YummyRepository;

class YummyService 
{
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

    //Restaurant CRUD 
    public function getAllRestaurants()
    {
        return $this->yummyRepository->getAllRestaurants();
    }
    public function addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats,  $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber)
    {
        if(str_contains($header_image, '_')) 
            $header_image = "\img\\restaurants\\".substr($header_image, strpos($header_image, "_") + 1, strpos($header_image, '.')-1)."\\".$header_image;
        else
            $header_image = "\img\\".$header_image;
        
        if(str_contains($restaurant_image, '_')) 
            $restaurant_image = "\img\\restaurants\\".substr($restaurant_image, strpos($restaurant_image, "_") + 1, strpos($restaurant_image, "."))."\\".$restaurant_image;
        else
            $restaurant_image = "\img\\".$restaurant_image;

        if(str_contains($menu_image, '_')) 
            $menu_image = "\img\\restaurants\\".substr($menu_image, strpos($menu_image, "_") + 1, strpos($menu_image, "_")+2)."\\".$menu_image;
        else
            $menu_image = "\img\\".$menu_image;


        return $this->yummyRepository->addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber);
    }
    public function deleteRestaurantbyId($id)
    {
        return $this->yummyRepository->deleteRestaurantbyId($id);
    }
    public function updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber)
    {
        //check of de afbeelding nieuw is, null is in controller terug gezet naar bestaande waarde, zo heoft de database hier niet nog 3x aangeroepen te worden 
        if(!str_contains($header_image, '\img')){
            if(str_contains($header_image, '_')){
                $pos = strpos($header_image, "_");
                $header_image = "\img\\restaurants\\".substr($header_image, $pos + 1, strpos($header_image, '.') - $pos - 1)."\\".$header_image;
            }
            else{
                $header_image = "\img\\".$header_image;
            }
        }

        if(!str_contains($restaurant_image, '\img')){ 
            if(str_contains($restaurant_image, '_')){
                $pos = strpos($restaurant_image, "_");
                $restaurant_image = "\img\\restaurants\\".substr($restaurant_image, $pos + 1, strpos($restaurant_image, ".") - $pos - 1)."\\".$restaurant_image;
            }
            else{
                $restaurant_image = "\img\\".$restaurant_image;
            }
        }
        
        if(!str_contains($menu_image, '\img')){
            if(str_contains($menu_image, '_')){
                $pos = strpos($menu_image, "_");
                $menu_image = "\img\\restaurants\\".substr($menu_image, $pos + 1, strpos($menu_image, ".") - $pos - 1)."\\".$menu_image;
            }
            else{
                $menu_image = "\img\\".$menu_image;
            }
        } 

        return $this->yummyRepository->updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber);
    }

    //Session CRUD
    public function getAllSessions()
    {
        return $this->yummyRepository->getAllSessions();
    }
    public function addSession($restaurant_id, $start_datetime, $duration, $seats_left)
    {
        return $this->yummyRepository->addSession($restaurant_id, $start_datetime, $duration, $seats_left);
    }
    public function deleteSessionbyId($id)
    {
        return $this->yummyRepository->deleteSessionbyId($id);
    }
    public function updateSession($id, $start_datetime, $duration)
    {
        return $this->yummyRepository->updateSession($id, $start_datetime, $duration);
    }
}