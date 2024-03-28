<?php

namespace Services;

use Repositories\TicketRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

class SendTicketService
{
    private $ticketRepository;

    public function __construct()
    {
        $this->ticketRepository = new TicketRepository();
    }

    public function getTickets()
    {
        //get data after shopping cart is checked out
    }

    public function createTickets()
    {
        require_once '../vendor/autoload.php'; 
       
        //$dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait'); 

        $html = file_get_contents("../views/ticket/ticket.php"); 
        $dompdf->loadHtml($html);
        
        $dompdf->render();
        $pdfAttachment = $dompdf->output();

        return $pdfAttachment;
    }

    public function sendTicket($email)
    {
        require '../vendor/autoload.php';
        
        $pdfAttachment = $this->createTickets();

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->SMTPDebug = 0;                                       
                                                                        
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                       
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'festivalcrisis@gmail.com';             
            $mail->Password   = 'vfsidcwlbhtqolop';                         
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465;                                   
        
            //Recipients
            $mail->setFrom('festivalcrisis@gmail.com', 'The Festival organization');                                                 
            $mail->addAddress($email);           

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Your tickets for the Haarlem Festival';
            $mail->Body    = 'Your tickets are attached to this email.';
            $mail->AltBody = 'Your tickets are attached to this email.';
            $mail->addStringAttachment($pdfAttachment, 'tickets.pdf');

            $mail->send();

        } catch (Exception $e) {
            echo "Mail could not be sent. Contact the servicedesk.";
        }
    }
}