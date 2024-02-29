<?php
namespace Repositories;

class UserRepository extends Repository{
    
    public function editUser($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $id){
        $sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, address = :address, phone_number = :phone_number WHERE user_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':first_name', $newFirstName);
        $stmt->bindParam(':last_name', $newLastName);
        $stmt->bindParam(':date_of_birth', $newDateOfBirth);
        $stmt->bindParam(':address', $newAddress);
        $stmt->bindParam(':phone_number', $newPhoneNumber);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}