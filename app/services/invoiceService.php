<?php

namespace Services;

use Repositories\InvoiceRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

class InvoiceService{
    private $invoiceRepository;

    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
    }

    public function getInvoice()
    {
        //get data after shopping cart is checked out
    }

    public function calculateVat()
    {
        //horeca, culturele en recreatieve evenementen vallen allemaal onder het 9% btw-tarief
        $vatPercentage = 0.09; 
        
        //$vat = $totalPrice * $vatPercentage;
    }

    public function createInvoice()
    {
        require_once '../vendor/autoload.php'; 
       
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait'); 

        $html = file_get_contents("../views/invoice/invoice.html"); 
        $dompdf->loadHtml($html);
        
        $dompdf->render();
        $pdfAttachment = $dompdf->output();

        return $pdfAttachment;
    }

    public function sendInvoice($email)
    {
        require '../vendor/autoload.php';
        
        $pdfAttachment = $this->createInvoice();

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
            $mail->Subject = 'Invoice the Haarlem Festival';
            $mail->Body    = 'Your invoice is attached to this email.';
            $mail->AltBody = 'Your invoice is attached to this email.';
            $mail->addStringAttachment($pdfAttachment, 'invoice.pdf');

            $mail->send();

        } catch (Exception $e) {
            echo "Mail could not be sent. Contact the servicedesk.";
        }
    }
}