<?php
namespace Controllers;

class ShoppingcartController {

    private $shoppingcartService;

    public function __CONSTRUCT(){
        $this->shoppingcartService = new \Services\ShoppingcartService();
    }

    public function index(){
        unset($_SESSION['Tickets']);
        if (!isset($_SESSION['Tickets']) || !is_array($_SESSION['Tickets'])) {
            $_SESSION['Tickets'] = [];   
        }
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);


            // $ticket1 = new \Models\Ticket(4,1,'Historical Tour','This is a Historical Tour around Haarlem',2);
            // $ticket2 = new \Models\Ticket(5,1,'Music event Reservation','This is a reservation for music event 1',1);
            // $ticket3 = new \Models\Ticket(6,1,'Restaurant Reservation','This is a reservation for Restaurant 1',2);
        
            // // Serialize the Ticket objects
            // $serialized_ticket1 = serialize($ticket1);
            // $serialized_ticket2 = serialize($ticket2);
            // $serialized_ticket3 = serialize($ticket3);

            // $_SESSION['Tickets'][] = $serialized_ticket1;
            // $_SESSION['Tickets'][] = $serialized_ticket2;
            // $_SESSION['Tickets'][] = $serialized_ticket3;

            $this->shoppingcartService->getUsersTickets($user);

            
        }
        require_once __DIR__ . '/../views/shoppingcart/index.php';
                
    
    }

    public function get(){
        $shoppingcartID = htmlspecialchars($_GET['shoppingcartID']);
        $dbtickets = $this->shoppingcartService->getShoppingcartTickets($shoppingcartID);
        if(isset($dbtickets)){
            $_SESSION['Tickets'] = $dbtickets;
        }
        require_once __DIR__ . '/../views/shoppingcart/index.php';
    }

    public function remove(){
        $ticketID = htmlspecialchars($_GET['ticketID']);
        $this->shoppingcartService->remove($ticketID);
        header('Location:/shoppingcart');
    }

    public function Share(){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            $this->shoppingcartService->Share($user);
        } else {
            header('Location:/register/loginview?errorMessage=You need to be logged in to share your shoppingcart');
        }
    }

    public function Pay(){

        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);


            // Initialize an empty array to store input values
            // $inputValues = [];
            $totalPrice = 0;

            // Loop through all POST data
            foreach ($_POST as $key => $value) {
                // Check if first part starts with "PriceLabel"
                if (substr($key, 0, 10) === 'PriceLabel') {
                    // For non-array inputs, directly store the value
                    // $inputValues[$key] = $value;
                    $totalPrice += $value;
                }
            }


            $this->shoppingcartService->Pay($user, $totalPrice);
        } else {
            header('Location:/register/loginview?errorMessage=You need to be logged in to pay for your shoppingcart');
        }
    }

    public function changeQuantity(){
        $ticketID = htmlspecialchars($_POST['inputTicketID']);
        $quantity = htmlspecialchars($_POST['inputQuantity']);
        $this->shoppingcartService->changeQuantity($ticketID, $quantity);
        header('Location:/shoppingcart');
    }

    public function cancel(){
        $this->shoppingcartService->cancel();
    }

    public function agendaView(){
        $calendar = $this->build_calendar(3, 2024);
    
        $calendar = '<div style="col-11">' . $calendar . '</div>';
        
        $calendar .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';
        require_once __DIR__ . '/../views/shoppingcart/agendaview.php';
    }

    function build_calendar($month, $year) {
        $daysOfWeek = array('SU','MO','TU','WE','TH','FR','SA');
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
        $numberDays = date('t',$firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
    
        
    
        $monthName = $dateComponents['month'];
        $dayOfWeek = $dateComponents['wday'];
        $calendar = "<table class='calendar table table-condensed table-bordered'>";
        $calendar .= "<tr>";
        foreach($daysOfWeek as $day) {
            $calendar .= "<th class=''>$day</th>";
        }
        $calendar .= "<caption>$monthName $year</caption>";
        
        $currentDay = 1;
        $calendar .= "</tr><tr>";
        if ($dayOfWeek > 0) {
            $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
        }
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        while($currentDay <= $numberDays){
            if($dayOfWeek == 7){
                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";
            }
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
    
            $Tickets = $this->shoppingcartService->getTicketsByDateAndUser($date);
            if($Tickets){
                if(date('Y-m-d') == $date){
                $calendar .= "<td class='day text-success' rel='$date'>
                                <b>$currentDay </b><br> <small>
                                Ticket Amount:".count($Tickets).
                                "</small> </td>";
                } else {
                    $calendar .= "<td class='day' rel='$date'>$currentDay<br> <small>Ticket Amount:"
                    .count($Tickets).
                    "</small> </td>";
                }
            } else {
                if(date('Y-m-d') == $date){
                    $calendar .= "<td class='day text-success' rel='$date'><b>$currentDay</b></td>";
                } else {
                    $calendar .= "<td class='day' rel='$date'>$currentDay</td>";
                }
            }
    
            $currentDay++;
            $dayOfWeek++;
        }
        if($dayOfWeek != 7){
            $remainingDays = 7 - $dayOfWeek;
            $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
        }
        $calendar .= "</tr>";
        $calendar .= "</table>";
        return $calendar;
    }
}