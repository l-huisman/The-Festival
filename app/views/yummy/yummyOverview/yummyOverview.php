<?php
require_once __DIR__ . '/../../../views/elements/header.php';
?>

<link type="text/css" rel="stylesheet" href="\styles\yummyStyle.css"> 

<body>
    <form class="container" action="/yummy/restaurant" method="post">
        <?php foreach($restaurantList as $restaurant) : ?>
            <div class="container row yummyRestaurant">
                <div class="col-md-4 yummyImageContainer" style="order: 0;">
                    <img class="yummyImage" src="<?= $restaurant->getImage()?>" alt="restaurant image">
                </div>
                <div class="col-md-8 yummyContentContainer" style="order: 1;">
                    <h2>Restaurant <?= $restaurant->getName() ?></h2>
                    <p><?= $restaurant->getCuisine() ?> Cuisine</p>
                    <div class="row buttonContainer">
                        <a href="/yummy/restaurant?id=<?= $restaurant->getRestaurant_id() ?>" class="btn detailButton">More information</a>
                    </div>
                </div>         
            </div>
        <?php endforeach; ?>
    </form>
</body>

<?php
require_once __DIR__ . '/../../../views/elements/footer.php';
?>