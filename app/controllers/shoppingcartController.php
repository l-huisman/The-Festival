<?php
namespace Controllers;

class ShoppingcartController {

    private $shoppingcartService;

    public function __CONSTRUCT(){
        $this->shoppingcartService = new \Services\ShoppingcartService();
    }

    public function index(){
        if (!isset($_SESSION['Tickets']) || !is_array($_SESSION['Tickets'])) {
            $_SESSION['Tickets'] = [];   
        }
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
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

    public function processOrder(){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            $this->shoppingcartService->processOrder($user);
        } else {
            header('Location:/register/loginview?errorMessage=You need to be logged in to process your shoppingcart');
        }
    }

    function filterCustomerData(&$str) {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"'))
            $str = '"' . str_replace('"', '""', $str) . '"';
    }

    public function test(){

        $customers_data = array(
            array(
                'customers_id' => '1',
                'customers_firstname' => 'Chris',
                'customers_lastname' => 'Cavagin',
                'customers_email' => 'chriscavagin@gmail.com',
                'customers_telephone' => '9911223388'
            ),
            array(
                'customers_id' => '2',
                'customers_firstname' => 'Richard',
                'customers_lastname' => 'Simmons',
                'customers_email' => 'rsimmons@media.com',
                'customers_telephone' => '9911224455'
            ),
            array(
                'customers_id' => '3',
                'customers_firstname' => 'Steve',
                'customers_lastname' => 'Beaven',
                'customers_email' => 'ateavebeaven@gmail.com',
                'customers_telephone' => '8855223388'
            ),
            array(
                'customers_id' => '4',
                'customers_firstname' => 'Howard',
                'customers_lastname' => 'Rawson',
                'customers_email' => 'howardraw@gmail.com',
                'customers_telephone' => '9911334488'
            ),
            array(
                'customers_id' => '5',
                'customers_firstname' => 'Rachel',
                'customers_lastname' => 'Dyson',
                'customers_email' => 'racheldyson@gmail.com',
                'customers_telephone' => '9912345388'
            )
        );

        // Filter Customer Data
        

        // File Name & Content Header For Download
        $file_name = "customers_data.xls";
        header("Content-Disposition: attachment; filename=\"$file_name\"");
        header("Content-Type: application/vnd.ms-excel");

        //To define column name in first row.
        $column_names = false;
        // run loop through each row in $customers_data
        foreach ($customers_data as $row) {
            if (!$column_names) {
                echo implode("\t", array_keys($row)) . "\n";
                $column_names = true;
            }
            // The array_walk() function runs each array element in a user-defined function.
            array_walk($row, array($this, 'filterCustomerData'));
            echo implode("\t", array_values($row)) . "\n";
        }
        exit;
    }

    public function exportOrderInformation(){
        $orderID = htmlspecialchars($_GET['orderID']);
        $this->shoppingcartService->exportOrderInformation($orderID);
    }

    public function Pay(){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            $totalPrice = htmlspecialchars($_POST['totalPrice']);
            $this->shoppingcartService->Pay($user, $totalPrice);
        } else {
            header('Location:/register/loginview?errorMessage=You need to be logged in to pay for your shoppingcart');
        }
    }

    public function changeQuantity(){
        $ticketID = htmlspecialchars($_POST['inputTicketID']);
        $quantity = htmlspecialchars($_POST['inputQuantity']);
        $this->shoppingcartService->changeQuantity($ticketID, $quantity);

        if(isset($_POST['orgin'])){
            header('Location:/shoppingcart/agendaView');
        } else {
            header('Location:/shoppingcart');
        }
    }

    public function cancel(){
        $this->shoppingcartService->cancel();
    }

    public function agendaView(){
        if(isset($_POST['SelectedMonth'])){
            $SelectedMonth = htmlspecialchars($_POST['SelectedMonth']);
            $year = date('Y', strtotime($SelectedMonth));
            $month = date('m', strtotime($SelectedMonth));
        } else {
            $month = date('m');
            $year = date('Y');
        }
        $calendar = $this->build_calendar($month, $year);
    
        $calendar = '<div style="col-12">' . $calendar . '</div>';
        
        $calendar .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';

        require_once __DIR__ . '/../views/shoppingcart/agendaview.php';
    }

    function build_calendar($month, $year) {
        $daysOfWeek = array('SU','MO','TU','WE','TH','FR','SA');
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
        $numberDays = date('t',$firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        if(strlen($month) < 2){
            $month = '0'.$month;
        }
        $dayOfWeek = $dateComponents['wday'];
        $calendar = "<table class='calendar table table-condensed table-bordered'>";
        $calendar .= "<tr>";
        foreach($daysOfWeek as $day) {
            $calendar .= "<th class=''>$day</th>";
        }
        $calendar .= "<caption><form method='POST' action='/shoppingcart/agendaView'><input type='month' name='SelectedMonth' value='$year-$month'><input type='submit' value='Go' class='btn btn-primary'></form></caption>";
        $currentDay = 1;
        $calendar .= "</tr><tbody><form method='POST' action='/shoppingcart/pay'><tr>";
        if ($dayOfWeek > 0) {
            $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
        }
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        $totalPrice = 0.0;
        while($currentDay <= $numberDays){
            if($dayOfWeek == 7){
                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";
            }
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
            $Tickets = $this->shoppingcartService->getTicketsByDateAndUser($date);
            if(isset($Tickets)){
                foreach($Tickets as $ticket){
                    $totalPrice += $ticket->quantity * $ticket->price;
                }
            }
            
            $calendar = $this->addTicketsToCalendar($Tickets, $calendar, $date, $currentDay);
            $currentDay++;
            $dayOfWeek++;
        }
        if($dayOfWeek != 7){
            $remainingDays = 7 - $dayOfWeek;
            $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
        }
        
        $calendar .= "</tbody></tr>";
        $calendar .= "</table>

        <div class='mt-3'>
            Total Price: &euro;<input type='text' class='border-0' id='totalPrice' name='totalPrice' readonly value='$totalPrice'>
        </div>
        
        <input type='submit' class='btn btn-success' value='Pay'><a href='/shoppingcart/index' class='btn btn-info'>List view</a></form>";
        return $calendar;
    }

    public function addTicketsToCalendar($Tickets, $calendar, $date, $currentDay){
        if($Tickets){
            if(date('Y-m-d') == $date){
                $calendar .= "<td class='day text-success' rel='$date'><b>$currentDay </b><br>";
                foreach($Tickets as $Ticket){
                    $calendar .= "<small>$Ticket->title: ".$Ticket->getTime()."</small>
                    <input type='hidden' id='quantity' value='$Ticket->quantity'>
                    <a href='/shoppingcart/remove?ticketID=$Ticket->id' class='del btn btn-danger'><i class='fa-solid fa-trash-can'></i></a>
                    <span data-bs-toggle='modal' data-bs-target='#exampleModal' class='edit btn btn-warning'><i class='fa-solid fa-pen'></i></span> 
                    <br>";
                }
                $calendar .= "<hr></td>";
            } else {
                $calendar .= "<td class='day' rel='$date'>$currentDay<br>";
                foreach($Tickets as $Ticket){
                    $calendar .= "<small>$Ticket->title: ".$Ticket->getTime()."</small>
                    <input type='hidden' id='quantity' value='$Ticket->quantity'>
                    <a href='/shoppingcart/remove?ticketID=$Ticket->id' class='del btn btn-danger'><i class='fa-solid fa-trash-can'></i></a>
                    <span data-bs-toggle='modal' data-bs-target='#exampleModal' class='edit btn btn-warning'><i class='fa-solid fa-pen'></i></span>
                    <br>";
                }
                $calendar .= "<hr></td>";
            }
        } else {
            if(date('Y-m-d') == $date){
                $calendar .= "<td class='day text-success' rel='$date'><b>$currentDay</b></td>";
            } else {
                $calendar .= "<td class='day' rel='$date'>$currentDay</td>";
            }
        }
        return $calendar;
    }
}