<?php

namespace Models;
class Tour
{
    private $tour_id;

    private $start_location;

    private $price;

    private $seats;

    private $time;

    private $name;

    private $language;

    private $guide_id;




    public function __construct($tour_id, $start_location, $price, $seats, $time, $name, $language, $guide_id)
    {
        $this->tour_id = $tour_id;
        $this->start_location = $start_location;
        $this->price = $price;
        $this->seats = $seats;
        $this->time = $time;
        $this->name = $name;
        $this->language = $language;
        $this->guide_id = $guide_id;
    }

    
  public function getTour()
    {
        return $this->tour_id;
    }
 
    public function getStartLocation()
    {
        return $this->start_location;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getSeats()
    {
        return $this->seats;
    }
   public function getTime()
    {
        return $this->time;
    }

    public function getGuideName()
    {
        return $this->name;
    }
    public function getLanguage()
    {
        return $this->language;
    }

    public function getGuideId()
    {
        return $this->guide_id;
    }



}