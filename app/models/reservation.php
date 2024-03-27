<?php

namespace Models;

class Reservation extends Ticket{

    private $ticket_id;
    private $restaurant_id;
    private $session_id;
    private $comment;
    private $active;
    
    public function __construct($ticket_id, $restaurant_id, $session_id, $comment, $active){
        $this->ticket_id = $ticket_id;
        $this->restaurant_id = $restaurant_id;
        $this->session_id = $session_id;
        $this->comment = $comment;
        $this->active = $active;
    }

    public function getTicket_id(){
        return $this->ticket_id;
    }
    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getSession_id(){
        return $this->session_id;
    }
    public function getComment(){
        return $this->comment;
    }
    public function getActive(){
        return $this->active;
    }

}
?>
