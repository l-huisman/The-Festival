<?php

namespace Controllers;

use Services\ResetPasswordService;
use Exception;

class ResetPasswordController
{
    private $passwordService;
    private $randomCode;

    function __construct(){
        $this->passwordService = new ResetPasswordService();
    }

    public function index(){
        require __DIR__ . '/../views/register/resetPassword.php';
    }

    public function resetPassword(){
        if (isset($_POST['buttonReset']))
        {
            $email = htmlspecialchars($_POST['email']);
            
            if ($this->passwordService->checkEmail($email) == false){
                header("Location: http://localhost/resetPassword?errorMessage=Email not found");
            }
            else{
                $_SESSION['email'] = $email;
                try{
                    // random nummer genereren om nieuw wachtwoord te kunnen instellen
                    $randomCode = $this->passwordService->generateCode();
                    $_SESSION['rndCode'] = $randomCode;
                    $this->passwordService->sendMail($randomCode, $email);
                    header("Location: /resetPassword/checkCode");
                    return;
                }
                catch(Exception $e){
                    header("Location: http://localhost/resetPassword?errorMessage=Email not found");
                }
            header("Location: http://localhost/resetPassword?errorMessage=password or username wrong");
            }
        }
    }

    public function checkCode(){
        if (isset($_POST['buttonCheck']))
        {
            $code = htmlspecialchars($_POST['code']);

            if ($_SESSION['rndCode'] == $code){
                $this->newPassword();
                return;
            }
        }
        require __DIR__ . '/../views/register/checkCode.php';
    }

    public function newPassword(){
        if (isset($_POST['buttonNewPassword']))
        {
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);

            if ($password == $password2){
                if(strlen($password) < 7){
                    require __DIR__ . '/../views/register/newPassword.php';
                    return;
                }
                else{
                    $this->passwordService->newPassword($password, $_SESSION['email']);
                    require __DIR__ . '/../views/register/login.php';
                    return;
                }
            }
        }

        require __DIR__ . '/../views/register/newPassword.php';
    }
}