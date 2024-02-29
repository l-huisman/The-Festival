
<body>
    <div class="container">
        <?php if($restaurant != null): ?>

        <div class="p-5 text-center bg-body-tertiary rounded-3 restaurantHeaderImage">
            <h1 class="text-body-emphasis restaurantHeader">Restaurant name</h1>
        </div>

        <div class="restaurantButtonContainer">
            <button type="button" class="btn overviewButton"><a href="/yummy">Back</a></button>
        </div>

        <div class="row featurette restaurantAboutContainer">
            <div class="col-md-5 restaurantAboutContainerImage">
                <img class="restaurantAboutImage rounded-3" src="/img/kikker.jpg">
            </div>    
            <div class="col-md-7 restaurantAboutContainerContent">
                <h2>About Restaurant <?= $restaurant->getName() ?> </h2>
                <p><?= $restaurant->getDescription() ?></p>
            </div>  
        </div>   

        <div class="row restaurantMenuInformation">
            <p class="col-md-4">
                <?= $restaurant->getCuisine()?> Cuisine
                <br>Prices
                <br>€<?= $restaurant->getPrice() ?><br>€<?= $restaurant->getPrice_kids() ?>
            </p>
            <img src="/img/kikker.jpg" alt="" class="col-md-4 rounded-3 restaurantMenuInformationImage">
            <img src="/img/kikker.jpg" alt="" class="col-md-4 rounded-3 restaurantMenuInformationImage">
        </div> 
        
        <div class="row restaurantMakeReservation">
            <div class="row restaurantMakeReservation_header">
                <h2>Make a reservation</h2>
            </div>

            <form class="container" action="/yummy/restaurant" method="post">

            <div class="row">
                <label class="form-label" for="cars">Select a time:</label>
                <select class="form-control" name="sessionsDropdown">
                    <option value="0">Select a time</option>
                    <?php foreach($sessionsList as $sessions) : ?>
                        <option value="<?= $sessions->getSession_id() ?>"><?= $sessions->getDate()?></option>
                    <?php endforeach; ?>
                </select>        
            </div>

            <div class="row">
                <label class="form-label" for="seats">Seats:</label>
                <input class="form-control" type="number" id="seats" name="seats" min="1">
                 
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

<style>
    body{
        --yummyButtonColor: #353e8c;
        --yummyButtonHoverColor: #454e96;
        --yummyButtonTextColor: #ffffff;
        --yummyContainerPadding: 15px;
        --yummyContainerMargin: 5%;
        --yummyContainerColor: #f7f7f7;
    }
    .restaurantHeaderImage{
        width: 100%;
        height: 400px;
        background-image: url("/img/kikker.jpg");
        background-repeat: no-repeat;
        background-position: 100% 0%;
        background-size: cover;
        display: flex;
        align-items: center;
    }
    .restaurantHeader{
        color: white !important;
        font-size: 50px;
        width: 100%;
    }
    .overviewButton{
        margin-top: var(--yummyContainerMargin);
        background-color: var(--yummyButtonColor);
    }
    .overviewButton:hover{
        background-color: var(--yummyButtonHoverColor);
    }
    .overviewButton a{
        text-decoration: none;
        color: var(--yummyButtonTextColor);
    }
    .restaurantAboutContainer{
        display: flex;
        margin-top: var(--yummyContainerMargin);
    }
    .restaurantAboutContainerImage{
        display: flex;
    }
    .restaurantAboutImage{
        width: 100%;
        object-fit: cover;
    }
    .restaurantAboutContainerContent{
        padding-left: var(--yummyContainerPadding);
    }
    .restaurantMenuInformation{
        display: flex;
        flex-direction: row;
        margin-top: var(--yummyContainerMargin);
        border-left: black 1px solid;
        margin-left: 2px;
    }
    .restaurantMenuInformation > p{
        padding: var(--yummyContainerPadding);
        align-self: center;
    }
    .restaurantMenuInformationImage{
        padding: var(--yummyContainerPadding);
    }
    .restaurantMakeReservation{
        margin-top: var(--yummyContainerMargin);
        background-color: var(--yummyContainerColor);
        border-radius: var(--yummyBorderRadius);
        padding: var(--yummyContainerPadding);
    }
    .restaurantMakeReservation_header{
        margin-top: var(--yummyContainerMargin);
        text-align: center;
    }
    .detailButton{
        background-color: var(--yummyButtonColor);
        color: var(--yummyButtonTextColor);
        margin-top: 2%;
    }
    .detailButton:hover{
        background-color: var(--yummyButtonHoverColor);
        color: var(--yummyButtonTextColor);
    }

</style>