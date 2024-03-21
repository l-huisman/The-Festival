<?php

namespace Models;

class Ticket
{
    public $ticketID;
    public $userID;
    public $title;
    public $datetime;
    public $location;
    public $description;
    public $quantity;
    public $price;
    public $shoppingcartID;

    //make the shoppingcart_id null if it is not passed
    public function __construct($ticketID, $userID, $title, $datetime, $location, $description, $quantity, $price, $shoppingcartID = null)
    {
        $this->ticketID = $ticketID;
        $this->userID = $userID;
        $this->title = $title;
        $this->datetime = $datetime;
        $this->location = $location;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->shoppingcartID = $shoppingcartID;
    }


    public function __toString()
    {
        return "Ticket: [id: $this->id, user_id: $this->user_id, title: $this->title, description: $this->description]";
    }

    public function getTime(){
        return date('H:i', strtotime($this->datetime));
    }

    public function getDate(){
        return date('Y-m-d', strtotime($this->datetime));
    }
}
