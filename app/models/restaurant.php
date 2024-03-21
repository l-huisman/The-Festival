<?php

namespace Models;

class Restaurant{
    private $restaurant_id;
    private $name;
    private $cuisine;
    private $header_image;
    
    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getCuisine(){
        return $this->cuisine;
    }
    public function getImage(){
        return $this->header_image;
    }
}