<?php

namespace Models;

class OrderItem {
    // Properties
    public $orderItemID;
    public $orderID;
    public $ticketID;
    public $quantity;
    public $price;

    // Constructor
    public function __construct($orderItemID, $orderID, $ticketID, $quantity, $price) {
        $this->orderItemID = $orderItemID;
        $this->orderID = $orderID;
        $this->ticketID = $ticketID;
        $this->quantity = $quantity;
        $this->price = $price;
    }
}

?>