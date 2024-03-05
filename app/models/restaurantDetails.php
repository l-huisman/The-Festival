<?php

namespace Models;

class RestaurantDetails{
    private $restaurant_id;
    private $name;
    private $description;
    private $price;
    private $price_kids;
    private $star_rating;
    private $cuisine;
    private $website;
    private $phonenumber;
    private $total_seats;
    private $streetname;
    private $postalcode;
    private $city;
    private $housenumber;

    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getPrice_kids(){
        return $this->price_kids;
    }
    public function getStar_rating(){
        return $this->star_rating;
    }
    public function getCuisine(){
        return $this->cuisine;
    }
    public function getWebsite(){
        return $this->website;
    }
    public function getPhonenumber(){
        return $this->phonenumber;
    }
    public function getTotal_seats(){
        return $this->total_seats;
    }
    public function getStreetname(){
        return $this->streetname;
    }
    public function getPostalcode(){
        return $this->postalcode;
    }
    public function getCity(){
        return $this->city;
    }
    public function getHousenumber(){
        return $this->housenumber;
    }
}