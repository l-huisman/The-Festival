<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<div class="container"> 
    <h1>Restaurants</h1>
    <a href="/yummy/addRestaurant" class="btn btn-success">Add</a>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col text-truncate">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Price kids</th>
                <th scope="col">Website</th>
                <th scope="col">Phonenumber</th>
                <th scope="col">Total seats</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($restaurantList as $restaurant) {?>
                <tr>
                    <td><?= $restaurant->getName() ?></td>
                    <td><?= $restaurant->getDescription() ?></td>
                    <td><?= $restaurant->getPrice() ?></td>
                    <td><?= $restaurant->getPrice_kids() ?></td>
                    <td><?= $restaurant->getWebsite() ?></td>
                    <td><?= $restaurant->getPhonenumber() ?></td>
                    <td><?= $restaurant->getTotal_seats() ?></td>
                    <td><a href="/yummy/editRestaurant?id=<?= $restaurant->getRestaurant_id() ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="/yummy/deleteRestaurant?id=<?= $restaurant->getRestaurant_id() ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>