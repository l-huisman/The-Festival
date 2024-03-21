<?php

namespace Models;

class Order {
    // Properties
    public $orderID;
    public $userID;
    public $orderDateTime;
    public $totalPrice;

    // Constructor
    public function __construct($orderID, $userID, $orderDateTime, $totalPrice) {
        $this->orderID = $orderID;
        $this->userID = $userID;
        $this->orderDateTime = $orderDateTime;
        $this->totalPrice = $totalPrice;
    }
}

?>