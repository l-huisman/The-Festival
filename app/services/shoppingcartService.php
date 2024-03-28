<?php 
namespace Services;

//require_once '../vendor/autoload.php';
require_once '../vendor/stripe/stripe-php/init.php';

use Models\Ticket;



class ShoppingcartService{
    private $shoppingcartRepository;
    private $ticketRepository;

    private $tourService;

    private $orderRepository;

    public function __construct(){
        $this->shoppingcartRepository = new \Repositories\ShoppingcartRepository();
        $this->ticketRepository = new \Repositories\TicketRepository();
        $this->orderRepository = new \Repositories\OrderRepository();
        $this->tourService = new \Services\TourService();
    }

    public function remove($TicketID){
        if(isset($_SESSION['Tickets'])){
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Ticket = unserialize($Serialized_Ticket);
                if($this->is_serialized($Ticket)){
                    $Ticket = unserialize($Ticket);
                }
                if($Ticket->ticketID == $TicketID){
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
                if($this->is_serialized($Ticket)){
                    $Ticket = unserialize($Ticket);
                }
                if($Ticket->ticketID == $TicketID){
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
                if($this->is_serialized($Unserialized_Ticket)){
                    $Unserialized_Ticket = unserialize($Unserialized_Ticket);
                }
                $TicketID = $this->ticketRepository->addTicket($user->user_id, $Unserialized_Ticket->title, $Unserialized_Ticket->datetime, $Unserialized_Ticket->location, $Unserialized_Ticket->description, $Unserialized_Ticket->quantity, $Unserialized_Ticket->price, $shoppingcartID);
                $Unserialized_Ticket->ticketID = $TicketID;
                $Serialized_Ticket = serialize($Unserialized_Ticket);
                $_SESSION['Tickets'][$index] = serialize($Serialized_Ticket);
            }
        }
        else if(isset($dbtickets)){
            $_SESSION['Tickets'] = $dbtickets;
            print_r('test2');
            die();
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
            if ($this->is_serialized($Unserialized_Ticket)) {
                $Unserialized_Ticket = unserialize($Unserialized_Ticket);
            }
            
            $found = false;
            foreach($dbtickets as $dbTicket){
                
                if($Unserialized_Ticket->ticketID == $dbTicket->ticketID){
                    $Unserialized_Ticket->quantity = $dbTicket->quantity;
                    $found = true;
                }
            }
            if(!$found){
                $TicketID = $this->ticketRepository->addTicket($user->user_id, $Unserialized_Ticket->title, $Unserialized_Ticket->datetime, $Unserialized_Ticket->location, $Unserialized_Ticket->description, $Unserialized_Ticket->quantity, $Unserialized_Ticket->price, $shoppingcartID);
                $Unserialized_Ticket->ticketID = $TicketID;
                $Serialized_Ticket = serialize($Unserialized_Ticket);
                $_SESSION['Tickets'][$index] = serialize($Serialized_Ticket);
            }
        }

        //LOOP through the tickets in the database and check if they are in the session if not add them to the session
        foreach($dbtickets as $dbTicket){
            $found = false;
            foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                $Unserialized_Ticket = unserialize($Serialized_Ticket);
                if ($this->is_serialized($Unserialized_Ticket)) {
                    $Unserialized_Ticket = unserialize($Unserialized_Ticket);
                }
                if($Unserialized_Ticket->ticketID == $dbTicket->ticketID){
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
        $tickets = array();
        $tickets = array();
        if(isset($_SESSION['user'])){
            
            
            $user = unserialize($_SESSION['user']);
            $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
            $tickets = $this->ticketRepository->getTicketsByDateAndUser($date, $user->user_id, $shoppingcartID);
            return $tickets;
        }else if(isset($_SESSION['Tickets'])){
            
            
            $tickets = array();
            foreach($_SESSION['Tickets'] as $index => $Serialized_ticket){
                $Ticket = unserialize($Serialized_ticket);
                if($this->is_serialized($Ticket)){
                    $Ticket = unserialize($Ticket);
                }
                if($Ticket->getDate() == $date){
                    $tickets[] = $Ticket;
                }
            }

            //sort tickets by time
            usort($tickets, function($a, $b){
                return strtotime($a->datetime) - strtotime($b->datetime);
            });
            

            //sort tickets by time
            usort($tickets, function($a, $b){
                return strtotime($a->datetime) - strtotime($b->datetime);
            });
            
            return $tickets;
        }
        else {
            return null;
        }
    }

    private function is_serialized($object){
        if(is_object($object)){
            return false;
        }
        return true;
    }

    public function processOrder($user){
        $Tickets = array();
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
        header('Location:/shoppingcart/exportOrderInformation?orderID='.$orderID);
    }

    public function exportOrderInformation($orderID){
        $order = $this->orderRepository->getOrderByID($orderID);
        $orderItems = $this->orderRepository->getOrderItemsByOrderID($orderID);
        
        
        $Tickets = array();
        foreach($orderItems as $orderItem){
            $Tickets[] = $this->ticketRepository->getTicketByID($orderItem->ticketID);
        }
        
        
        // delete the tickets
        foreach($Tickets as $Ticket){
            if(isset($Ticket)){
                $this->ticketRepository->setTicketToPaid($Ticket->ticketID);
                
                // $this->ticketRepository->removeTicket($Ticket->ticketID);
                //remove tickets from session
                if(isset($_SESSION['Tickets'])){
                    foreach($_SESSION['Tickets'] as $index => $Serialized_Ticket){
                        $Unserialized_Ticket = unserialize($Serialized_Ticket);
                        if($this->is_serialized($Unserialized_Ticket)){
                            $Unserialized_Ticket = unserialize($Unserialized_Ticket);
                        }
                        if($Unserialized_Ticket->ticketID == $Ticket->ticketID){
                            unset($_SESSION['Tickets'][$index]);
                        }
                    }
                }
            }
        }

        // change the Order variablie into an array
        $order = array(
            'OrderID' => $order->orderID,
            'UserID' => $order->userID,
            'OrderDateTime' => $order->orderDateTime,
            'TotalPrice' => $order->totalPrice
        );

        $orderData = array();
        foreach($Tickets as $Ticket){
            $orderData[] = array(
                'TicketID' => $Ticket->ticketID,
                'Title' => $Ticket->title,
                'startDate' => $Ticket->datetime,
                'Location' => $Ticket->location,
                'Description' => $Ticket->description,
                'Quantity' => $Ticket->quantity,
                'Price' => $Ticket->price
            );
        }

        // File Name & Content Header For Download
        $file_name = "customers_data.xls";
        header("Content-Disposition: attachment; filename=\"$file_name\"");
        header("Content-Type: application/vnd.ms-excel");

        //To define column name in first row.
        $column_names = false;
        // run loop through each row in $customers_data
        foreach ($orderData as $row) {
            if (!$column_names) {

                //echo order data
                echo implode("\t", array_keys($order)) . "\n";
                echo implode("\t", array_values($order)) . "\n";
                
                echo "\n";

                echo implode("\t", array_keys($row)) . "\n";
                $column_names = true;
            }
            // The array_walk() function runs each array element in a user-defined function.
            array_walk($row, array($this, 'filterCustomerData'));
            echo implode("\t", array_values($row)) . "\n";
        }
        exit;
    }

    function filterCustomerData(&$str) {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"'))
            $str = '"' . str_replace('"', '""', $str) . '"';
    }

    private function calculateTotalPrice($Tickets){
        $totalPrice = 0;
        foreach($Tickets as $Ticket){
            if($this->is_serialized($Ticket)){
                $Ticket = unserialize($Ticket);
            }
            $totalPrice += $Ticket->price * $Ticket->quantity;
        }
        return $totalPrice;
    }

    public function saveTourinTicketSession($tour_id)
    {
       
        $tour = $this->tourService->getTourbyId($tour_id);
        
        if(isset($_SESSION['Tickets'])){
            //check if user is logged in
            if(isset($_SESSION['user'])){
                $user = unserialize($_SESSION['user']);
                //get users shoppincart id
                $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
                //insert ticket with shoppingcart id
                $ticket = new Ticket(null, unserialize($_SESSION['user'])->user_id, "Historical Tour1", $tour->getTime(), $tour->getStartLocation(), "", 1, $tour->getPrice(), $shoppingcartID );
            }else {
                //without
                $ticket = new Ticket(null, unserialize($_SESSION['user'])->user_id, "Historical Tour1", $tour->getTime(), $tour->getStartLocation(), "", 1, $tour->getPrice(), null );
            }
            $_SESSION['Tickets'][] = serialize($ticket);
        }else{
            $_SESSION['Tickets'] = array();
            if(isset($_SESSION['user'])){
                $user = unserialize($_SESSION['user']);
                $shoppingcartID = $this->shoppingcartRepository->getUsersShoppingCartID($user->user_id);
                $ticket = new Ticket(null, unserialize($_SESSION['user'])->user_id, "Historical Tour1", $tour->getTime(), $tour->getStartLocation(), "", 1, $tour->getPrice(), $shoppingcartID );
            }else {
                $ticket = new Ticket(null, unserialize($_SESSION['user'])->user_id, "Historical Tour1", $tour->getTime(), $tour->getStartLocation(), "", 1, $tour->getPrice(), null );
            }
            $_SESSION['Tickets'][] = serialize($ticket);
        }

    }

}