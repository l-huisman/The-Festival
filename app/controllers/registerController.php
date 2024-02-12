<?php

namespace Controllers;

class RegisterController
{
    private $registerService;
    public function __construct()
    {
        $this->registerService = new \Services\RegisterService();
    }

    public function index()
    {
        require_once __DIR__ . '/../views/register/register.php';
    }

    public function loginView(){
        require_once __DIR__ . '/../views/register/login.php';
    }

    public function validateUser()
    {

        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $email = htmlspecialchars($_POST['email']);
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
        $address = htmlspecialchars($_POST['address']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $password = htmlspecialchars($_POST['password']);
        $gender = htmlspecialchars($_POST['gender']);

        $this->registerService->validateUser($firstName, $lastName, $email, $dateOfBirth, $address, $phoneNumber, $password, $gender);
        header('Location:/');
    }

    public function login()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $this->registerService->verifyLogin($email, $password);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location:/');
    }
        
}
