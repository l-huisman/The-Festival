<?php
namespace Controllers;

class ShoppingcartController {

    private $shoppingcartService;

    public function __CONSTRUCT(){
        $this->shoppingcartService = new \Services\ShoppingcartService();
    }

    public function index(){
        // unset($_SESSION['Tickets']);
        if (!isset($_SESSION['Tickets']) || !is_array($_SESSION['Tickets'])) {
            $_SESSION['Tickets'] = [];
            
            $ticket1 = new \Models\Ticket(1,1,'Historical Tour','This is a Historical Tour around Haarlem',2);
            $ticket2 = new \Models\Ticket(3,1,'Music event Reservation','This is a reservation for music event 1',1);
            $ticket3 = new \Models\Ticket(5,1,'Restaurant Reservation','This is a reservation for Restaurant 1',2);
        
            // Serialize the Ticket objects
            $serialized_ticket1 = serialize($ticket1);
            $serialized_ticket2 = serialize($ticket2);
            $serialized_ticket3 = serialize($ticket3);

            $_SESSION['Tickets'][] = $serialized_ticket1;
            $_SESSION['Tickets'][] = $serialized_ticket2;
            $_SESSION['Tickets'][] = $serialized_ticket3;
        }        
    
        require_once __DIR__ . '/../views/shoppingcart/index.php';
    }

    public function remove(){
        $ticketID = htmlspecialchars($_GET['ticketID']);
        $this->shoppingcartService->remove($ticketID);
        header('Location:/shoppingcart');
    }

    public function Share(){
        $this->shoppingcartService->Share();
        header('Location:/shoppingcart');
    }

    public function changeQuantity(){
        $ticketID = htmlspecialchars($_POST['inputTicketID']);
        $quantity = htmlspecialchars($_POST['inputQuantity']);
        $this->shoppingcartService->changeQuantity($ticketID, $quantity);
        header('Location:/shoppingcart');
    }
}