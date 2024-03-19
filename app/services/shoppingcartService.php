<?php 
namespace Services;

//require_once '../vendor/autoload.php';
require_once '../vendor/stripe/stripe-php/init.php';



class ShoppingcartService{
    private $shoppingcartRepository;
    private $ticketRepository;

    private $orderRepository;

    public function __construct(){
        $this->shoppingcartRepository = new \Repositories\ShoppingcartRepository();
        $this->ticketRepository = new \Repositories\TicketRepository();
        $this->orderRepository = new \Repositories\OrderRepository();
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

    public function Share($user){
        $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
        echo "<script> window.location.href = 'https://api.whatsapp.com/send?text=http://localhost/shoppingcart/get?shoppingcartID=".$shoppingcartID."';</script>";
    }

    public function pay($user, $totalPrice){

        $totalCents = $totalPrice * 100;

        $stripe = new \Stripe\StripeClient('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');

        \Stripe\Stripe::setApiKey('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');

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Haarlem Festival Tickets',
                ],
                'unit_amount' => $totalCents,
              ],
              'quantity' => 1,
            ]],
            'payment_method_types' => ['ideal', 'card'],
            'mode' => 'payment',
            'success_url' => 'http://localhost/shoppingcart/processOrder',
            'cancel_url' => 'http://localhost/shoppingcart/cancel',
        ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
        // header('Location:https://buy.stripe.com/cN2159cg8bpFfRu6oo');
    }

    public function cancel(){
        $stripe = new \Stripe\StripeClient('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');

        \Stripe\Stripe::setApiKey('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');

        $checkout_session = $stripe->checkout->sessions->create([
            'mode' => 'setup',
            'currency' => 'eur',
            'success_url' => 'http://localhost/shoppingcart/processOrder',
            'cancel_url' => 'http://localhost/shoppingcart',
        ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
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

                $this->ticketRepository->addTicket($user->user_id, $Unserialized_Ticket->title, $Unserialized_Ticket->datetime, $Unserialized_Ticket->location, $Unserialized_Ticket->description, $Unserialized_Ticket->quantity, $Unserialized_Ticket->price, $shoppingcartID);
            }
        }
        else if(isset($dbtickets)){
            $_SESSION['Tickets'] = $dbtickets;
        }
    }

    public function getShoppingcartTickets($shoppingcartID){ 
        $tickets = $this->ticketRepository->getShoppingcartTickets($shoppingcartID);
        $serializedTickets = [];
        foreach($tickets as $ticket){
            $serializedTickets[] = serialize($ticket);
        }
        return $serializedTickets;
    }

    private function mergeSessionAndDBTickets($dbtickets, $user){
        //loopthrough the tickets in the session and check if they are in the database if not add them to the database
        $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
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
                $this->ticketRepository->addTicket($user->user_id, $Unserialized_Ticket->title, $Unserialized_Ticket->datetime, $Unserialized_Ticket->location, $Unserialized_Ticket->description, $Unserialized_Ticket->quantity, $Unserialized_Ticket->price, $shoppingcartID);
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


    public function getTicketsByDateAndUser($date){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
            $tickets = $this->ticketRepository->getTicketsByDateAndUser($date, $user->user_id, $shoppingcartID);
            return $tickets;
        }else if(isset($_SESSION['Tickets'])){
            $tickets = array();
            foreach($_SESSION['Tickets'] as $index => $Serialized_ticket){
                $Ticket = unserialize($Serialized_ticket);
                if($Ticket->date == $date){
                    $tickets[] = $Ticket;
                }
            }
            return $tickets;
        }
        else {
            return null;
        }
    }

    public function processOrder($user){
        $Tickets = null;
        if(!isset($_SESSION['Tickets'])){
            $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
            $Tickets = $this->ticketRepository->getShoppingcartTickets($shoppingcartID);
        }
        else{
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Tickets[] = unserialize($Serialized_Ticket);
            }
        }

        if(isset($Tickets)){
            $totalPrice = $this->calculateTotalPrice($Tickets);
            $orderID = $this->orderRepository->createOrderAndReturnID($user->user_id, $totalPrice);
        }else{
            header('Location:/shoppingcart');
            die();
        }
        if(isset($orderID)){
            $this->orderRepository->createOrderItems($orderID, $Tickets);
        }
        foreach($Tickets as $Ticket){
            $this->ticketRepository->removeTicket($Ticket->id);
        }
        header('Location:/shoppingcart/exportOrderInformation?orderID='.$orderID);
    }

    public function exportOrderInformation($orderID){
        $order = $this->orderRepository->getOrder($orderID);
        $orderItems = $this->orderRepository->getOrderItems($orderID);
    }

    private function calculateTotalPrice($Tickets){
        $totalPrice = 0;
        foreach($Tickets as $Ticket){
            $totalPrice += $Ticket->price * $Ticket->quantity;
        }
        return $totalPrice;
    }

}