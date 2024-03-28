<?php

namespace Repositories;

use PDO;

class ResetPasswordRepository extends Repository
{
    public function checkEmail($email){
        $stmt = $this->connection->prepare("SELECT user_id FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function newPassword($password, $email){
        $stmt = $this->connection->prepare("UPDATE user SET hashed_password = :password WHERE email = :email;");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}