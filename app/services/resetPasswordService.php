<?php

namespace Services;

use Repositories\ResetPasswordRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ResetPasswordService
{
    private $randomCode;

    // inspiratie bron projectgroep 1   
    function generateCode(){
        $randomCode = rand(100000, 999999);
        return $randomCode;
    }
    
    function checkEmail($email){
        $repository = new ResetPasswordRepository();
        return $repository->checkEmail($email);
    }

    function newPassword($password, $email){
        $repository = new ResetPasswordRepository();
        $hashedPasswd = password_hash($password, PASSWORD_DEFAULT);
        $repository->newPassword($hashedPasswd, $email);
        return;
    }

    // bron: https://packagist.org/packages/phpmailer/phpmailer
    function sendMail($randomCode, $email) {
        require '../vendor/autoload.php';

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
            $mail->Subject = 'Reset your password';
            $mail->Body    = 'Your code: <b>' . $randomCode . '</b>';
            $mail->AltBody = 'Your code: <b>' . $randomCode . '</b>';
        
            $mail->send();

        } catch (Exception $e) {
        }
    }
    
}