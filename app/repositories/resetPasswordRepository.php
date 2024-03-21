<?php

namespace Repositories;

use PDO;
use PDOException;

class ResetPasswordRepository extends Repository
{
    private $db;

    public function checkEmail($email){
        $stmt = $this->connection->prepare("SELECT user_id, fullname, email, password, role, registration_date FROM User WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function newPassword($password, $email){
        $stmt = $this->connection->prepare("UPDATE User SET password = :password WHERE email = :email;");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
    
}