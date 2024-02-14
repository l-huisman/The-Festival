<?php
namespace Repositories;

class TicketRepository extends Repository{
    public function getUsersTickets($user_ID){
        $sql = "SELECT ticketID, userID, title, description, quantity, shoppingcartID FROM tickets WHERE userID = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_ID);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $tickets = [];
        foreach($stmt as $ticket){
            $tickets[] = new \Models\Ticket($ticket['ticketID'], $ticket['userID'], $ticket['title'], $ticket['description'], $ticket['quantity'], $ticket['shoppingcartID']);
        }
        return $tickets; 

    }
}

?>