<?php

namespace Models;

class User
{
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $date_of_birth;
    public $address;
    public $phone_number;
    public $password;
    public $gender;
    public $role;

    public function __construct($user_id, $first_name, $last_name, $email, $date_of_birth, $address, $phone_number, $password, $gender, $role)
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->date_of_birth = $date_of_birth;
        $this->address = $address;
        $this->phone_number = $phone_number;
        $this->password = $password;
    }

}
