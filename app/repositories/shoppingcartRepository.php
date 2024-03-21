<?php
namespace Repositories;

class ShoppingcartRepository extends Repository{
    public function getUsersShoppingCartID($user_ID){
        $sql = "SELECT id FROM shoppingcart WHERE userID = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_ID);
        $stmt->execute();
        $stmt = $stmt->fetch();
        if($stmt){
            return $stmt['id'];
        }else{
            return null;
        }
    }
}



?>