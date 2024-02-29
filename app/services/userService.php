<?php
namespace Services;

class UserService {

    private $userRepositoy;
    public function __construct()
    {
        $this->userRepositoy = new \Repositories\UserRepository();
    }
    public function validateUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id){
        $this->userRepositoy->validateUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id);

        $this->changeSession($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id);

        header('Location:/home');
    }

    private function changeSession($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id){
        $user = unserialize($_SESSION['user']);
        $user->first_name = $newFirstName;
        $user->last_name = $newLastName;
        $user->date_of_birth = $newDateOfBirth;
        $user->address = $newAddress;
        $user->phone_number = $newPhoneNumber;
        $_SESSION['user'] = serialize($user);
    }

    public function getAllUsers(){
        return $this->userRepositoy->getAllUsers();
    }

    public function deleteUser($id){
        $this->userRepositoy->deleteUser($id);
    }

    public function getUserById($id){
        return $this->userRepositoy->getUserById($id);
    }

    public function validateUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id){
        $this->userRepositoy->editUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id);
    }
}

?>