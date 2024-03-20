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
            $stmt->bindParam(':ticketID', $Ticket->ticketID);
            $stmt->bindParam(':quantity', $Ticket->quantity);
            $stmt->bindParam(':price', $Ticket->price);
            $stmt->execute();
        }
    }

    public function getOrderByID($orderID){
        $sql = "SELECT orderID, userID, orderDateTime, totalPrice FROM orders WHERE orderID = :orderID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':orderID', $orderID);
        $stmt->execute();
        if($stmt) {
            $result = $stmt->fetch();
            return new \Models\Order($result['orderID'], $result['userID'], $result['orderDateTime'], $result['totalPrice']);
        }
        return null;
    }

    public function getOrderItemsByOrderID($orderID){
        $sql = "SELECT orderItemID, orderID, ticketID, quantity, price FROM orderItems WHERE orderID = :orderID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':orderID', $orderID);
        $stmt->execute();
        $orderItems = array();
        if($stmt) {
            $result = $stmt->fetchAll();
            foreach($result as $orderItem){
                $orderItems[] = new \Models\OrderItem($orderItem['orderItemID'], $orderItem['orderID'], $orderItem['ticketID'], $orderItem['quantity'], $orderItem['price']);
            }
            return $orderItems;
        }
        return null;
    }
}