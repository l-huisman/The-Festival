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
    private $header_image;
    private $restaurant_image;
    private $menu_image;
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
    public function getHeader_image(){
        return $this->header_image;
    }
    public function getRestaurant_image(){
        return $this->restaurant_image;
    }
    public function getMenu_image(){
        return $this->menu_image;
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

    // public function __construct($restaurant_id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber)
    // {
    //     $this->restaurant_id = $restaurant_id;
    //     $this->name = $name;
    //     $this->description = $description;
    //     $this->price = $price;
    //     $this->price_kids = $price_kids;
    //     $this->star_rating = $star_rating;
    //     $this->cuisine = $cuisine;
    //     $this->website = $website;
    //     $this->phonenumber = $phonenumber;
    //     $this->total_seats = $total_seats;
    //     $this->header_image = $header_image;
    //     $this->restaurant_image = $restaurant_image;
    //     $this->menu_image = $menu_image;
    //     $this->streetname = $streetname;
    //     $this->postalcode = $postalcode;
    //     $this->city = $city;
    //     $this->housenumber = $housenumber;
    // }


}