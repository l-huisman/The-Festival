<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container"> 
    <h1>Overview Restaurants</h1>
    <a href="/yummy/addRestaurant" class="btn btn-success">Add</a>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Price kids</th>
                <th scope="col">Star rating</th>
                <th scope="col">Cuisine</th>
                <th scope="col">Website</th>
                <th scope="col">Phonenumber</th>
                <th scope="col">Total seats</th>
                <th scope="col">Header image</th>
                <th scope="col">Restaurant image</th>
                <th scope="col">Menu image</th>
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
                    <td><?= $restaurant->getStar_rating() ?></td>
                    <td><?= $restaurant->getCuisine() ?></td>
                    <td><?= $restaurant->getWebsite() ?></td>
                    <td><?= $restaurant->getPhonenumber() ?></td>
                    <td><?= $restaurant->getTotal_seats() ?></td>
                    <td><?= $restaurant->getHeader_image() ?></td>
                    <td><?= $restaurant->getRestaurant_image() ?></td>
                    <td><?= $restaurant->getMenu_image() ?></td>
                    <td><a href="/yummy/editRestaurant?id=<?= $restaurant->getRestaurant_id() ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="/yummy/deleteRestaurant?id=<?= $restaurant->getRestaurant_id() ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>