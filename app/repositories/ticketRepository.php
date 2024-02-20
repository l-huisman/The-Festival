<?php
namespace Repositories;

class TicketRepository extends Repository{
    public function getShoppingcartTickets($shoppingcartID){
        $sql = "SELECT ticketID, userID, title, description, quantity, shoppingcartID FROM tickets WHERE shoppingcartID = :shoppingcartID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':shoppingcartID', $shoppingcartID);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $tickets = [];
        foreach($stmt as $ticket){
            $tickets[] = new \Models\Ticket($ticket['ticketID'], $ticket['userID'], $ticket['title'], $ticket['description'], $ticket['quantity'], $ticket['shoppingcartID']);
        }
        return $tickets; 
    }

    public function addTicket($user_ID, $title, $description, $quantity){
        $sql = "INSERT INTO tickets (userID, title, description, quantity) VALUES (:user_id, :title, :description, :quantity)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_ID);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->execute();
    }

    public function updateTicketQuantity($ticketID, $quantity){
        $sql = "UPDATE tickets SET quantity = :quantity WHERE ticketID = :ticket_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':ticket_id', $ticketID);
        $stmt->execute();
    }

    public function removeTicket($ticketID){
        $sql = "DELETE FROM tickets WHERE ticketID = :ticket_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':ticket_id', $ticketID);
        $stmt->execute();
    }
}

?>