<?php

namespace Services;

class AdminService{

    private $adminRepositoy;

    public function __construct()
    {
        $this->adminRepositoy = new \Repositories\AdminRepository();
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
}