<?php
namespace Services;

class UserService {

    private $userRepositoy;
    public function __construct()
    {
        $this->userRepositoy = new \Repositories\UserRepository();
    }
    public function editUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id){
        $this->userRepositoy->editUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id);

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
}

?>