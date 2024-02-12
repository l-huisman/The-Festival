<?php 

namespace Services;

class ShoppingcartService{
    public function remove($TicketID){
        if(isset($_SESSION['Tickets'])){
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Ticket = unserialize($Serialized_Ticket);
                if($Ticket->id == $TicketID){
                    unset($_SESSION['Tickets'][$index]);
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
                }
            }
        }
    }
}