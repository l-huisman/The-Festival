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

    public function manageAccount()
    {
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            require_once __DIR__ . '/../views/user/manageAccount.php';
        }else {
            header('Location:/');
        }
    }

    public function validateUser(){
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

        $this->userService->validateUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $user->user_id);
    }

    public function overviewCustomers(){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            if($user->role == "admin"){
                $users = $this->userService->getAllUsers();
                require_once __DIR__ . '/../views/user/overviewCustomers.php';
            }
            else {
                header('Location:/');
                die();
            }
        }else {
            header('Location:/testtest');
            die();
        }
    }

    public function deleteUser(){
        if(isset($_SESSION['user']) ){
            $user = unserialize($_SESSION['user']);
            if($user->role == 'admin'){
                $user_id = htmlspecialchars($_GET['user_id']);
                $this->userService->deleteUser($user_id);
                header('Location:/user/overviewCustomers');
            }
            else {
                header('Location:/');
                die();
            }
        }else {
            header('Location:/');
            die();
        }
    }

    public function editUserView(){
        $user_id = htmlspecialchars($_GET['user_id']);
        $user = $this->userService->getUserById($user_id);
        require_once __DIR__ . '/../views/user/editUser.php';
    }

    public function validateUserAccount(){
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
            if($user->role == 'admin'){
                $newFirstName = htmlspecialchars($_POST['newFirstName']);
                $newLastName = htmlspecialchars($_POST['newLastName']);
                $newDateOfBirth = htmlspecialchars($_POST['newDateOfBirth']);
                $newAddress = htmlspecialchars($_POST['newAddress']);
                $newPhoneNumber = htmlspecialchars($_POST['newPhoneNumber']);
                $newRole = htmlspecialchars($_POST['newRole']);
                $user_id = htmlspecialchars($_POST['user_id']);
                $this->userService->validateUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id);

                header('Location:/user/overviewCustomers');
            }
            else {
                header('Location:/');
                die();
            }
        }else {
            header('Location:/');
            die();
        }
        
    }
}

?>