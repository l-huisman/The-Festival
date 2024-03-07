<?php
 $count = 0;
?>

<body>
    <form class="container" action="/yummy/restaurant" method="post">
        <?php foreach($restaurantList as $r) : ?>
            <div class="container row yummyRestaurant">
                <div class="col-md-4 yummyImageContainer" style="order: 0;">
                    <img class="yummyImage" src="/img/eend.jpg" alt="alt">
                </div>
                <div class="col-md-8 yummyContentContainer" style="order: 1;">
                    <h2>Restaurant <?= $r->getName() ?></h2>
                    <p><?= $r->getCuisine() ?> Cuisine</p>
                    <div class="row buttonContainer">
                        <button type="submit" class="btn detailButton" name="detail-page" value="<?= $r->getRestaurant_id() ?>">More information</button>
                    </div>
                </div>         
            </div>
        <?php endforeach; ?>
    </form>
</body>

<style>
    body{
        --yummyButtonColor: #353e8c;
        --yummyButtonHoverColor: #454e96;
        --yummyButtonTextColor: #ffffff;
        --yummyContainerPadding: 15px;
        --yummyContainerColor: #f7f7f7;
        --yummyBorderRadius: 15px;
        --yummyContainerMargin: 2%;
    }
   
    .yummyRestaurant{
        display:flex;
        margin-top: var(--yummyContainerMargin);
        background-color: var(--yummyContainerColor);
        border-radius: var(--yummyBorderRadius);
        padding: var(--yummyContainerPadding);
    }
    .yummyImageContainer{
        display: flex;
        width: 40%;
        padding: var(--yummyContainerPadding);
    }
    .yummyImage{
        width: 100%;
        object-fit: cover;
    }
    .yummyContentContainer{
        display: flex;
        flex-direction: column;
        width: 60%;
        padding: var(--yummyContainerPadding);
       
    }
    .detailButton{
        background-color: var(--yummyButtonColor);
        color: var(--yummyButtonTextColor);
        align-self: flex-end;
    }
    .detailButton:hover{
        background-color: var(--yummyButtonHoverColor);
        color: var(--yummyButtonTextColor);
    }
    .buttonContainer{
        display: flex;
        align-self: flex-end;
        height: 100%;
        margin: 1rem;
    }

</style>