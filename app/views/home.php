<?php
require_once __DIR__ . '/elements/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <style>
        .carousel-inner img {
            object-fit: cover;
            height: 70vh;
            position: center;
            overflow: hidden;
        }

        .buttons {
            border: 1px solid #e86225;
            color: #e86225 !important;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
        }

        .buttons:hover {
            border: 1px solid #ffffff;
            background-color: #e86225;
            color: #ffffff !important;
            transition: background-color 1s, border 1s, color 1s;
        }



        .custom-link {
            padding: 15px 0;
        }



        img {
            width: 90%;
            height: 280px;
            object-fit: cover;
        }

        @media(max-width: 767px) {

            .container-custom {
                padding-top: 50px;
                padding-bottom: 50px;
            }
        }
    </style>

</head>

<body>
    <div id="carouselExampleCaptions" class="carousel slider" data-bs-ride="true" style="margin: 50px 320px 100px 320px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://d22ngpx8edtvxq.cloudfront.net/webuploads/_blockImage/93584/Foodhal-borrel-Enschede-2021-Liggend-LR-2-klein.webp" class="d-block w-100" alt="hello">
                <div class="carousel-caption d-none d-md-block bg-dark" style="--bs-bg-opacity: .5;">
                    <h3>Yummie</h3>
                    <p>Some of Haarlems most famous restaurants .</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.classicstogo.nl/files/2016/06/Top-10-Jazz-RH.jpg" class="d-block w-100" alt="hello">
                <div class="carousel-caption d-none d-md-block bg-dark" style="--bs-bg-opacity: .5;">
                    <h3>Jazz</h3>
                    <p>Visit some of our best Jazz Artist</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.euroschoolindia.com/wp-content/uploads/2023/07/importance-of-history-scaled-1.jpg" class="d-block w-100" alt="hello">
                <div class="carousel-caption d-none d-md-block bg-dark" style="--bs-bg-opacity: .5;">
                    <h3>Historic</h3>
                    <p>The most interesting Historic experience you will ever see!</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>


    </div>

    <div class="container w-100">
        <div class="row container-custom justify-content-center">
            <div class='d-flex align-items column-gap-1'>
                <div class="col-sm-12 col-md-4">
                    <img src="https://d22ngpx8edtvxq.cloudfront.net/webuploads/_blockImage/93584/Foodhal-borrel-Enschede-2021-Liggend-LR-2-klein.webp" alt="1">
                    <h2 class="mt-3 mb-3">Food</h2>
                    <p class="me-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh sem, ultricies sit amet
                        tellus ut, iaculis interdum ante. Quisque at nibh ac diam faucibus congue.
                    </p>
                    <div class="custom-link">
                        <a href="#" class="buttons">Read more ></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img src="https://www.classicstogo.nl/files/2016/06/Top-10-Jazz-RH.jpg" alt="1">
                    <h2 class="mt-3 mb-3">Jazz</h2>
                    <p class="me-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh sem, ultricies sit amet
                        tellus ut, iaculis interdum ante. Quisque at nibh ac diam faucibus congue.
                    </p>
                    <div class="custom-link">
                        <a href="#" class="buttons">Read more ></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img src="https://www.euroschoolindia.com/wp-content/uploads/2023/07/importance-of-history-scaled-1.jpg" alt="1">
                    <h2 class="mt-3 mb-3">History</h2>
                    <p class="me-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh sem, ultricies sit amet
                        tellus ut, iaculis interdum ante. Quisque at nibh ac diam faucibus congue.
                    </p>
                    <div class="custom-link">
                        <a href="#" class="buttons">Read more ></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (!isset($_SESSION['user']) or $_SESSION['user']['role'] == 'admin') {
            require_once __DIR__ . '/../views/wysiwyg/index.php';
        }
        require_once __DIR__ . '/elements/footer.php';
        ?>