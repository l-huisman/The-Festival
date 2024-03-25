<?php

namespace Services;

class AdminService{

    private $adminRepositoy;
    private $orderRepository;

    public function __construct()
    {
        $this->adminRepositoy = new \Repositories\AdminRepository();
        $this->orderRepository = new \Repositories\OrderRepository();
    }
    public function getAllUsers(){
        return $this->adminRepositoy->getAllUsers();
    }

    public function deleteUser($id){
        $this->adminRepositoy->deleteUser($id);
    }

    public function getUserById($id){
        return $this->adminRepositoy->getUserById($id);
    }

    public function validateUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id){
        $this->adminRepositoy->editUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id);
    }

    public function verifyAdminLogin($email, $password){
        $user = $this->adminRepositoy->getUserByEmail($email);
        if(isset($user) && $user->role == "admin"){
            if($this->verifyPassword($password, $user->hashed_password)){
                $_SESSION['user'] = serialize($user);
                header('Location:/home');
                die();
            }else{
                header('Location:/admin/loginPage?errorMessage=wrong password');
                die();
            }
        }
        header('Location:/admin/loginPage?errorMessage=admin user does not exist');
        die();
    }

    public function getAllOrders(){
        return $this->orderRepository->getAllOrders();
    }

    private function verifyPassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }

    public function getOrderById($orderID){
        return $this->orderRepository->getOrderById($orderID);
    }
}