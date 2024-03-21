<?php

namespace Models;

class Session{
    private $session_id;
    private $restaurant_id;
    private $name;
    private $date;
    private $duration;
    private $seats_reserved;

    public function getSession_id(){
        return $this->session_id;
    }
    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDate(){
        return $this->date;
    }
    public function getDuration(){
        return $this->duration;
    }
    public function getSeats_reserved(){
        return $this->seats_reserved;
    }
}