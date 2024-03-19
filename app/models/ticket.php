<?php

namespace Models;

class Ticket
{
    public $id;
    public $user_id;
    public $title;
    public $datetime;
    public $location;
    public $description;
    public $quantity;
    public $price;
    public $shoppingcart_id;

    //make the shoppingcart_id null if it is not passed
    public function __construct($id, $user_id, $title, $datetime, $location, $description, $quantity, $price, $shoppingcart_id = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->datetime = $datetime;
        $this->location = $location;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->shoppingcart_id = $shoppingcart_id;
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
