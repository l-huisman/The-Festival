<?php
namespace Repositories;

class TicketRepository extends Repository{
    public function getShoppingcartTickets($shoppingcartID){
        $sql = "SELECT ticketID, userID, title, datetime, location, description, quantity, price, shoppingcartID FROM tickets WHERE shoppingcartID = :shoppingcartID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':shoppingcartID', $shoppingcartID);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $tickets = [];
        if($stmt){
            foreach($stmt as $ticket){
                $tickets[] = new \Models\Ticket($ticket['ticketID'], $ticket['userID'], $ticket['title'], $ticket['datetime'], $ticket['location'], $ticket['description'], $ticket['quantity'], $ticket['price'], $ticket['shoppingcartID']);
            }
            return $tickets; 
        }
        return null;
    }

    public function addTicket($user_ID, $title, $datetime, $location, $description, $quantity, $price, $shoppingcartID){
        $sql = "INSERT INTO tickets (userID, title, datetime, location, description, quantity, price, shoppingcartID) VALUES (:user_id, :title, :datetime, :location, :description, :quantity, :price, :shoppingcartID)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_ID);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':datetime', $datetime);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':shoppingcartID', $shoppingcartID);
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

    public function getTicketsByDateAndUser($date, $user_ID, $shoppingcartID){
        $date = $date . '%';
        $sql = "SELECT ticketID, userID, title, datetime, location, description, quantity, price, shoppingcartID FROM tickets WHERE datetime like :date AND userID = :user_id AND shoppingcartID = :shoppingcartID ORDER BY datetime ASC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':user_id', $user_ID);
        $stmt->bindParam(':shoppingcartID', $shoppingcartID);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $tickets = [];
        if($stmt){
            foreach($stmt as $ticket){
                $tickets[] = new \Models\Ticket($ticket['ticketID'], $ticket['userID'], $ticket['title'], $ticket['datetime'], $ticket['location'], $ticket['description'], $ticket['quantity'], $ticket['price'], $ticket['shoppingcartID']);
            }
            return $tickets;
        }
        return null;
    }

    public function getTicketByID($ticketID){
        $sql = "SELECT ticketID, userID, title, datetime, location, description, quantity, price, shoppingcartID FROM tickets WHERE ticketID = :ticketID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':ticketID', $ticketID);
        $stmt->execute();
        $stmt = $stmt->fetch();
        if($stmt){
            return new \Models\Ticket($stmt['ticketID'], $stmt['userID'], $stmt['title'], $stmt['datetime'], $stmt['location'], $stmt['description'], $stmt['quantity'], $stmt['price'], $stmt['shoppingcartID']);
        }
        return null;
    }
}

?>