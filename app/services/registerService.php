<?php

namespace Services;

class RegisterService {
    private $registerRepository;

    public function __construct()
    {
        $this->registerRepository = new \Repositories\RegisterRepository();
    }

    public function getUserByEmail($email)
    {
        return $this->registerRepository->getUserByEmail($email);
    }

    public function validateUser($firstName, $lastName, $email, $dateOfBirth, $address, $phoneNumber, $password, $gender)
    {
        if (empty($firstName) || empty($lastName) || empty($email) || empty($dateOfBirth) || empty($address) || empty($phoneNumber) || empty($password) || empty($gender)) {
            return false;
        }
        $user = $this->registerRepository->getUserByEmail($email);
        if(!$user){
            $hashedPassword = $this->hashPassword($password);
            unset($password);
            $this->registerRepository->createUser($firstName, $lastName, $email, $dateOfBirth, $address, $phoneNumber, $hashedPassword, $gender);
        }else {
            //user email already exists
        }
    }

    public function verifyLogin($email, $password){
        $user = $this->getUserByEmail($email);
        if($user){
            if($this->verifyPassword($password, $user['hashed_password'])){
                $_SESSION['user'] = $user;
                header('Location:/');
            }else{
                header('Location:/register/loginView?erroMessage=wrong password');
            }
        }
    }

    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function verifyPassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }
}
?>