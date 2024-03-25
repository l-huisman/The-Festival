<?php
require_once __DIR__ . '/../../../views/elements/header.php';
?>

<link type="text/css" rel="stylesheet" href="\styles\yummyDetailStyle.css"> 

<body>
    <div class="container">
        <?php if($restaurant != null): ?>

            <div class="row p-5 text-center bg-body-tertiary rounded-3 ">
                <img class="restaurantHeaderImage" src="<?= $restaurant->getHeader_image()?>" alt="restaurant image">
                <div>
                    <h1 class="text-body-emphasis restaurantHeader">Restaurant <?= $restaurant->getName() ?></h1>
                </div>
            </div>
            <div class="restaurantButtonContainer">
                <button type="button" class="btn overviewButton"><a href="/yummy">Back</a></button>
            </div>
            <div class="row featurette restaurantAboutContainer">
                <div class="col-md-5 restaurantAboutContainerImage">
                    <img class="restaurantAboutImage rounded-3" src="<?= $restaurant->getRestaurant_image()?>">
                </div>    
                <div class="col-md-7 restaurantAboutContainerContent">
                    <h2>About Restaurant <?= $restaurant->getName() ?> </h2>
                    <p><?= $restaurant->getDescription() ?></p>
                </div>  
            </div>   
            <div class="row restaurantMenuInformation">
                <section class="col-md-4">
                    <p><?= $restaurant->getCuisine()?> Cuisine</p>
                    <p>Price adult €<?= $restaurant->getPrice() ?><p>
                    <p>Price children €<?= $restaurant->getPrice_kids() ?></p>
                </section>
                <img src="<?= $restaurant->getMenu_image()?>" alt="" class="col-md-4 rounded-3 restaurantMenuInformationImage">
                <section class="col-md-4">
                    <p>Rating: <?= $restaurant->getStar_rating() ?>/5</p>
                    <p>Total seats: <?= $restaurant->getTotal_seats() ?></p>
                    <p>Website: <a href="<?= $restaurant->getWebsite() ?>"><?= $restaurant->getWebsite() ?></a></p>
                    <p>Phone number: <a href="<?= $restaurant->getPhonenumber() ?>"> <?= $restaurant->getPhonenumber() ?></a></p>
                    <p>Address: 
                        <a href="http://maps.google.com/maps?q=<?=$restaurant->getHousenumber()?>+<?=$restaurant->getStreetname()?>,+<?=$restaurant->getCity()?>,+<?=$restaurant->getPostalcode()?>"> 
                        <?= $restaurant->getStreetname() ?> <?= $restaurant->getHousenumber() ?>, <?= $restaurant->getPostalcode() ?> <?= $restaurant->getCity() ?></a>
                    </p>
            </section>
            </div> 
            <div class="row restaurantMakeReservation">
                <div class="row restaurantMakeReservation_header">
                    <h2>Make a reservation for restaurant <?= $restaurant->getName() ?></h2>
                </div>
                <form class="container" action="/yummy/restaurant" method="post">
                    <div class="row">
                        <label class="form-label" for="cars">Select a date and time:</label>
                        <select class="form-control" name="sessionsDropdown" required>
                            <option value="">Nothing selected</option>
                            <?php foreach($sessionsList as $sessions) : ?>
                                <option value="<?= $sessions->getSession_id() ?>"><?= $sessions->getDate()?></option>
                            <?php endforeach; ?>
                        </select>        
                    </div>
                    <div class="row">
                        <label class="form-label" for="seats">Seats:</label>
                        <input class="form-control" type="number" id="seats" name="seats" min="1" max="" required>
                    </div>
                    <div class="row">
                        <label class="form-label" for="comment">Comment: (optional)</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <!-- value -->
                    <button type="submit" class="btn detailButton" name="restaurant-reservation" value="">Add reservation to cart</button>
                </form>
            </div>

        <?php else: ?>
            <h1>Restaurant not found</h1></php>
            <?php endif; ?>
    </div>
</body>

<?php
require_once __DIR__ . '/../../../views/elements/footer.php';
?>