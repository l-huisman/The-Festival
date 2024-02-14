<?php 

namespace Services;

class ShoppingcartService{
    private $shoppingcartRepository;
    private $ticketRepository;

    public function __construct(){
        $this->shoppingcartRepository = new \Repositories\ShoppingcartRepository();
        $this->ticketRepository = new \Repositories\TicketRepository();
    }

    public function remove($TicketID){
        if(isset($_SESSION['Tickets'])){
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Ticket = unserialize($Serialized_Ticket);
                if($Ticket->id == $TicketID){
                    unset($_SESSION['Tickets'][$index]);
                    $this->ticketRepository->removeTicket($TicketID);
                }
            }
        }
    }

    public function Share(){

    }

    public function changeQuantity($TicketID, $Quantity){
        if(isset($_SESSION['Tickets'])){
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Ticket = unserialize($Serialized_Ticket);
                if($Ticket->id == $TicketID){
                    $Ticket->quantity = $Quantity;
                    $_SESSION['Tickets'][$index] = serialize($Ticket);
                    $this->ticketRepository->updateTicketQuantity($TicketID, $Quantity);
                }
            }
        }
    }

    public function getUsersTickets($user){
        $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
        $dbtickets = $this->ticketRepository->getShoppingcartTickets($shoppingcartID);
        if(isset($_SESSION['Tickets']) && isset($dbtickets)){
            $this->mergeSessionAndDBTickets($dbtickets, $user);
        }
        else if(isset($_SESSION['Tickets'])){
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Unserialized_Ticket = unserialize($Serialized_Ticket);
                $this->ticketRepository->addTicket($user->user_id, $Unserialized_Ticket->title, $Unserialized_Ticket->description, $Unserialized_Ticket->quantity);
            }
        }
        else if(isset($dbtickets)){
            $_SESSION['Tickets'] = $dbtickets;
        }
    }

    private function mergeSessionAndDBTickets($dbtickets, $user){
        //loopthrough the tickets in the session and check if they are in the database if not add them to the database
        foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
            $Unserialized_Ticket = unserialize($Serialized_Ticket);
            $found = false;
            foreach($dbtickets as $dbTicket){
                if($Unserialized_Ticket->id == $dbTicket->id){
                    $Unserialized_Ticket->quantity = $dbTicket->quantity;
                    $found = true;
                }
            }
            if(!$found){
                $this->ticketRepository->addTicket($user->user_id, $Unserialized_Ticket->title, $Unserialized_Ticket->description, $Unserialized_Ticket->quantity);
            }
        }

        //LOOP through the tickets in the database and check if they are in the session if not add them to the session
        foreach($dbtickets as $dbTicket){
            $found = false;
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Unserialized_Ticket = unserialize($Serialized_Ticket);
                if($Unserialized_Ticket->id == $dbTicket->id){
                    $Unserialized_Ticket->quantity = $dbTicket->quantity;
                    $found = true;
                }
            }
            if(!$found){
                $_SESSION['Tickets'][] = serialize($dbTicket);
            }
        }
    }
}