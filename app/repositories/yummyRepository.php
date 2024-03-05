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
            $stmt = $this->connection->prepare("SELECT restaurant_id, name, cuisine FROM Restaurant;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Models\Restaurant');
            //return $stmt->fetch();
        }
        catch(PDOException $e){
            echo "werkt niet meid";
        }  
    }
    public function getRestaurantById($restaurant_id){
        try{
            $stmt = $this->connection->prepare("SELECT Restaurant.restaurant_id, Restaurant.name, Restaurant.description, Restaurant.price, Restaurant.price_kids, Restaurant.star_rating, Restaurant.cuisine, Restaurant.website, Restaurant.phonenumber, Restaurant.total_seats, Location.streetname, Location.postalcode, Location.city, Location.housenumber FROM Restaurant JOIN Location ON Restaurant.restaurant_id=Location.detail_id WHERE restaurant_id = :id");
            $stmt->bindParam(':id', $restaurant_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\restaurantDetails');
            return $stmt->fetch();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getSessions($id){
        try{
            $stmt = $this->connection->prepare("SELECT Session.session_id, Restaurant.name, Session.start_datetime as date, Session.duration, Session.seats_left FROM Session JOIN Restaurant ON Session.restaurant_id=Restaurant.restaurant_id WHERE Session.restaurant_id = :id");
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
            $stmt = $this->connection->prepare("SELECT Session.session_id, Restaurant.name, Session.start_datetime as date, Session.duration, Session.seats_left FROM Session JOIN Restaurant ON Session.restaurant_id=Restaurant.restaurant_id WHERE Session.session_id = :id");
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
}