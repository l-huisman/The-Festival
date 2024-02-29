<?php

namespace Models;

class Restaurant{
    private $restaurant_id;
    private $name;
    private $cuisine;
    
    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getCuisine(){
        return $this->cuisine;
    }
}