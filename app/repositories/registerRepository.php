<?php

namespace Repositories;

class RegisterRepository extends Repository{
    public function getUserByEmail($email)
    {
        $sql = "SELECT user_id, first_name, last_name, email, date_of_birth, address, phone_number, hashed_password, gender, role FROM user WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt = $stmt->fetch();
        $user = new \Models\User($stmt['user_id'], $stmt['first_name'], $stmt['last_name'], $stmt['email'], $stmt['date_of_birth'], $stmt['address'], $stmt['phone_number'], $stmt['hashed_password'], $stmt['gender'], $stmt['role']);
        return $user;
    }

    public function createUser($firstName, $lastName, $email, $dateOfBirth, $address, $phoneNumber, $hashedPassword, $gender){
        $sql = "INSERT INTO user (first_name, last_name, email, date_of_birth, address, phone_number, hashed_password, gender) VALUES (:first_name, :last_name, :email, :date_of_birth, :address, :phone_number, :hashed_password. :gender)";
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
    }

    public function getUsersTickets($user_ID){
        $sql = "SELECT ticketID, userID, title, description, quantity, shoppingcartID FROM ticket WHERE user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_ID);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $tickets = [];
        foreach($stmt as $ticket){
            $tickets[] = new \Models\Ticket($ticket['ticket_id'], $ticket['user_id'], $ticket['title'], $ticket['description'], $ticket['quantity'], $ticket['shoppingcart_id']);
        }
        return $tickets;

    }
}

?>