<?php

namespace Models;

class Ticket
{
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $quantity;
    public $shoppingcart_id;

    //make the shoppingcart_id null if it is not passed
    
    public function __construct($id, $user_id, $title, $description, $quantity, $shoppingcart_id = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->shoppingcart_id = $shoppingcart_id;
    }


    public function __toString()
    {
        return "Ticket: [id: $this->id, user_id: $this->user_id, title: $this->title, description: $this->description]";
    }
}
