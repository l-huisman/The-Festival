<?php 

namespace Repositories;

class AdminRepository extends Repository{

    public function getAllUsers(){
        $sql = "SELECT user_id, first_name, last_name, email, date_of_birth, address, phone_number, hashed_password, gender, role FROM user";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $users = [];
        foreach($stmt as $user){
            $users[] = new \Models\User($user['user_id'], $user['first_name'], $user['last_name'], $user['email'], $user['date_of_birth'], $user['address'], $user['phone_number'], $user['hashed_password'], $user['gender'], $user['role']);
        }
        return $users;
    }

    public function deleteUser($id){
        $sql = "DELETE FROM user WHERE user_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getUserById($id){
        $sql = "SELECT user_id, first_name, last_name, email, date_of_birth, address, phone_number, hashed_password, gender, role FROM user WHERE user_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt = $stmt->fetch();
        $user = new \Models\User($stmt['user_id'], $stmt['first_name'], $stmt['last_name'], $stmt['email'], $stmt['date_of_birth'], $stmt['address'], $stmt['phone_number'], $stmt['hashed_password'], $stmt['gender'], $stmt['role']);
        return $user;
    }

    public function editUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id){
        $sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, address = :address, phone_number = :phone_number, role = :role WHERE user_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':first_name', $newFirstName);
        $stmt->bindParam(':last_name', $newLastName);
        $stmt->bindParam(':date_of_birth', $newDateOfBirth);
        $stmt->bindParam(':address', $newAddress);
        $stmt->bindParam(':phone_number', $newPhoneNumber);
        $stmt->bindParam(':role', $newRole);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
    }
}