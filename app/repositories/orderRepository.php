<?php

namespace Repositories;

class OrderRepository extends Repository{
    public function createOrderAndReturnID($user_ID, $totalPrice){
        $dateTime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `orders` (userID, orderDateTime, totalPrice) VALUES(:userID, :orderDateTime, :totalPrice)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':userID', $user_ID);
        $stmt->bindParam(':orderDateTime', $dateTime);
        $stmt->bindParam(':totalPrice', $totalPrice);
        $stmt->execute();
        return $this->connection->lastInsertId();
    }

    public function createOrderItems($orderID, $Tickets){
        foreach($Tickets as $Ticket){
            $sql = "INSERT INTO orderItems (orderID, ticketID, quantity, price) VALUES(:orderID, :ticketID, :quantity, :price)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':orderID', $orderID);
            $stmt->bindParam(':ticketID', $Ticket->id);
            $stmt->bindParam(':quantity', $Ticket->quantity);
            $stmt->bindParam(':price', $Ticket->price);
            $stmt->execute();
        }
    }
}