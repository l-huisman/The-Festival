<?php

namespace Models;

class User
{
    public $id;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    public function __construct($id, $email, $password, $created_at, $updated_at, $deleted_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }

    public function __toString()
    {
        return "User: [id: $this->id, email: $this->email, password: $this->password, created_at: $this->created_at, updated_at: $this->updated_at, deleted_at: $this->deleted_at]";
    }
}
