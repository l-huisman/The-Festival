<?php

namespace Repositories;

use PDO;
use PDOException;
use Models\Restaurant;
use Models\RestaurantDetails;
use Models\Session;

class YummyRepository extends Repository{

    public function getRestaurants(){
        try{
            $stmt = $this->connection->prepare("SELECT restaurant_id, name, cuisine, header_image FROM Restaurant;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Models\Restaurant');
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }  
    }
    public function getRestaurantById($restaurant_id){
        try{
            $stmt = $this->connection->prepare("SELECT Restaurant.restaurant_id, Restaurant.name, Restaurant.description, Restaurant.price, Restaurant.price_kids, Restaurant.star_rating, Restaurant.cuisine, Restaurant.website, Restaurant.phonenumber, Restaurant.total_seats, Restaurant.header_image, Restaurant.restaurant_image, Restaurant.menu_image, Location.streetname, Location.postalcode, Location.city, Location.housenumber FROM Restaurant JOIN Location ON Restaurant.restaurant_id=Location.detail_id WHERE restaurant_id = :restaurant_id ;");
            $stmt->bindParam(':restaurant_id', $restaurant_id);
 
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\RestaurantDetails');
            $result = $stmt->fetch();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getSessions($id){
        try{
            $stmt = $this->connection->prepare("SELECT Session.session_id, Restaurant.restaurant_id, Restaurant.name, Session.start_datetime as date, Session.duration, Session.seats_reserved FROM Session JOIN Restaurant ON Session.restaurant_id=Restaurant.restaurant_id WHERE Session.restaurant_id = :id ;");
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\session');
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getSessionById($id){
        try{
            $stmt = $this->connection->prepare("SELECT Session.session_id, Restaurant.restaurant_id, Restaurant.name, Session.start_datetime as date, Session.duration, Session.seats_reserved FROM Session JOIN Restaurant ON Session.restaurant_id=Restaurant.restaurant_id WHERE Session.session_id = :id ;");
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\session');
            $result = $stmt->fetch();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //Restaurant CRUD
    public function getAllRestaurants()
    {
        try{
            $stmt = $this->connection->prepare("SELECT 
                Restaurant.restaurant_id, 
                Restaurant.name, 
                Restaurant.description, 
                Restaurant.price, 
                Restaurant.price_kids, 
                Restaurant.star_rating, 
                Restaurant.cuisine, 
                Restaurant.website, 
                Restaurant.phonenumber, 
                Restaurant.total_seats, 
                Restaurant.header_image, 
                Restaurant.restaurant_image, 
                Restaurant.menu_image,
                Location.streetname, 
                Location.postalcode, 
                Location.city, 
                Location.housenumber 
                FROM Restaurant 
                INNER JOIN Location ON Restaurant.restaurant_id=Location.detail_id ;");

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\RestaurantDetails');
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber){
        try {
            $stmt = $this->connection->prepare(
            "INSERT INTO `Restaurant` (`name`, `description`, price, price_kids, star_rating, cuisine, website, phonenumber, total_seats, header_image, restaurant_image, menu_image) 
            VALUES (:name, :description, :price, :price_kids, :star_rating, :cuisine, :website, :phonenumber, :total_seats , :header_image, :restaurant_image, :menu_image);
            INSERT INTO `Location` (detail_id, `type`, streetname, postalcode, city, housenumber) 
            VALUES ((SELECT restaurant_id FROM Restaurant WHERE `name` = :name), 'Restaurant', :streetname, :postalcode, :city, :housenumber);");
           
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':price_kids', $price_kids);
            $stmt->bindParam(':star_rating', $star_rating);
            $stmt->bindParam(':cuisine', $cuisine);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':total_seats', $total_seats);
            $stmt->bindParam(':header_image', $header_image);
            $stmt->bindParam(':restaurant_image', $restaurant_image);
            $stmt->bindParam(':menu_image', $menu_image);

            $stmt->bindParam(':streetname', $streetname);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);
            $stmt->execute();

        } 
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deleteRestaurantbyId($id){
        try{
            $stmt = $this->connection->prepare(
                "DELETE FROM Session WHERE restaurant_id = :id;
                 DELETE FROM Restaurant WHERE restaurant_id = :id; 
                 DELETE FROM Location WHERE detail_id = :id; 
                 ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function updateRestaurant($restaurant_id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $header_image, $restaurant_image, $menu_image, $streetname, $postalcode, $city, $housenumber)
    {
        try {
            $stmt = $this->connection->prepare(
                "UPDATE Restaurant SET 
                name = :name, description= :description, price= :price, price_kids= :price_kids, star_rating = :star_rating, cuisine = :cuisine, website = :website, phonenumber = :phonenumber, total_seats = :total_seats, header_image = :header_image, restaurant_image = :restaurant_image, menu_image = :menu_image WHERE restaurant_id = :restaurant_id;
                
                UPDATE Location
                SET streetname = :streetname, postalcode = :postalcode, city = :city, housenumber = :housenumber WHERE detail_id = :restaurant_id;"); 

            $stmt->bindParam(':restaurant_id', $restaurant_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':price_kids', $price_kids);
            $stmt->bindParam(':star_rating', $star_rating);
            $stmt->bindParam(':cuisine', $cuisine);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':total_seats', $total_seats);
            $stmt->bindParam(':header_image', $header_image);
            $stmt->bindParam(':restaurant_image', $restaurant_image);
            $stmt->bindParam(':menu_image', $menu_image);

            $stmt->bindParam(':streetname', $streetname);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);

            $stmt->execute();
        } 
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    //Session CRUD
    public function getAllSessions()
    {
        try{
            $stmt = $this->connection->prepare("SELECT Session.session_id, Restaurant.restaurant_id, Restaurant.name, Session.start_datetime as date, Session.duration, Session.seats_reserved FROM Session JOIN Restaurant ON Session.restaurant_id=Restaurant.restaurant_id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\session');
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deleteSessionbyId($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Session WHERE session_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } 
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function addSession($restaurant_id, $start_datetime, $duration, $seats_reserved)
    {
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO `Session` (restaurant_id, start_datetime, duration, seats_reserved) VALUES (:restaurant_id, :start_datetime, :duration, :seats_reserved);" );
        
            $stmt->bindParam(':restaurant_id', $restaurant_id);
            $stmt->bindParam(':start_datetime', $start_datetime);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':seats_reserved', $seats_reserved);
            $stmt->execute();
        } 
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function updateSession($id, $start_datetime, $duration)
    {
        try {
            $stmt = $this->connection->prepare(
                "UPDATE Session SET start_datetime = :start_datetime, duration= :duration WHERE session_id = :id ;"); 

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':start_datetime', $start_datetime);
            $stmt->bindParam(':duration', $duration);
            $stmt->execute();
        } 
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}