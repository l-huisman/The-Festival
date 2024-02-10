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

    public function validateUser()
    {
        echo '<script>window.location.href = "/";</script>';

        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $email = htmlspecialchars($_POST['email']);
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
        $address = htmlspecialchars($_POST['address']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $password = htmlspecialchars($_POST['password']);
        $gender = htmlspecialchars($_POST['gender']);

        $this->registerService->validateUser($firstName, $lastName, $email, $dateOfBirth, $address, $phoneNumber, $password, $gender);

    }
        
}
