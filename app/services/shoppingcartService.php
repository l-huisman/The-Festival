<?php 
namespace Services;

//require_once '../vendor/autoload.php';
require_once '../vendor/stripe/stripe-php/init.php';



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
            'payment_method_types' => ['card', 'ideal'],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
        ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
        // header('Location:https://buy.stripe.com/cN2159cg8bpFfRu6oo');
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