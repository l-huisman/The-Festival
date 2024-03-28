<?php

namespace Repositories;

class RegisterRepository extends Repository{
    public function getUserByEmail($email)
    {
        $sql = "SELECT DISTINCT user_id, first_name, last_name, email, date_of_birth, address, phone_number, hashed_password, gender, role FROM user WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $users = [];
        foreach($stmt as $user){
            $users[] = new \Models\User($user['user_id'], $user['first_name'], $user['last_name'], $user['email'], $user['date_of_birth'], $user['address'], $user['phone_number'], $user['hashed_password'], $user['gender'], $user['role']);
        }if(count($users) > 0){
            return $users[0];
        }
        return null;
    }

    public function createUser($firstName, $lastName, $email, $dateOfBirth, $address, $phoneNumber, $hashedPassword, $gender){
        $sql = "INSERT INTO user (first_name, last_name, email, date_of_birth, address, phone_number, hashed_password, gender) VALUES (:first_name, :last_name, :email, :date_of_birth, :address, :phone_number, :hashed_password, :gender)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date_of_birth', $dateOfBirth);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone_number', $phoneNumber);
        $stmt->bindParam(':hashed_password', $hashedPassword);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();
        
        $last_id = $this->connection->lastInsertId();
        $sql = "INSERT INTO shoppingcart (userID) VALUES (:user_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $last_id);
        $stmt->execute();
    }
}

?>