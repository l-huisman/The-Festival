<?php
namespace Controllers;

class UserController {
    private $userService;
    public function __construct()
    {
        $this->userService = new \Services\UserService();
    }

    public function index()
    {
        // require_once __DIR__ . '/../views/register/register.php';
    }

    public function manageUser()
    {
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            require_once __DIR__ . '/../views/user/manageUser.php';
        }else {
            header('Location:/');
        }
    }

    public function editUser(){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
        }else {
            header('Location:/');
            die();
        }
        $newFirstName = htmlspecialchars($_POST['newFirstName']);
        $newLastName = htmlspecialchars($_POST['newLastName']);
        $newDateOfBirth = htmlspecialchars($_POST['newDateOfBirth']);
        $newAddress = htmlspecialchars($_POST['newAddress']);
        $newPhoneNumber = htmlspecialchars($_POST['newPhoneNumber']);

        $this->userService->editUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $user->user_id);


    }
}

?>