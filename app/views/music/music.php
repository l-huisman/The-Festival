<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<html>

<head>
    <title>Music</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClqONdpYoR8Ly8fZd3e0AiPZstN6pE3kg&callback=initMap&libraries=&v=weekly" async></script>
</head>

<body>
    <main>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container mt-3">
            <div class="row">
                <?php
                shuffle($artists);
                $counter = 0;
                foreach ($artists as $artist) {
                    if ($counter == 3) {
                        break;
                    }
                    $counter++;
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm d-flex flex-column align-items-center">
                            <img src="<?= $artist->getPictogram() ?>" width="50%" height="50%" class="rounded-circle py-3" />
                            <div class="card-body d-flex flex-column align-items-center">
                                <p class="card-text fs-3"><?= $artist->getName() ?></p>
                                <a href="/music/artist?id=<?= $artist->getId() ?>" class="btn btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Venues <span class="text-body-secondary"> to dance the night away.</span></h2>
                    <p class="lead">We have selected the best venues in town for you to enjoy the music of your favorite artists.</p>
                    <div class="container">
                        <?php
                        $i = 0;
                        foreach ($events as $event) {
                            if ($i % 2 == 0) {
                                echo '<div class="row">';
                            }
                        ?>
                            <div class="col-md-6">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $event->getVenue()->getName() ?></h5>
                                        <p class="card-text"><?= $event->getVenue()->getAddress() ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            if ($i % 2 == 1) {
                                echo '</div>';
                            }
                            $i++;
                        }
                        if ($i % 2 != 0) {
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>

                <div id="map" class="col-md-5" style="height: 30rem" ;>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette" id="events">
                <?php
                $dates = ["2024-07-27", "2024-07-28", "2024-07-29", "2024-07-30"];
                foreach ($dates as $date) {
                ?>
                    <div class="col-md-3 justify-content-center">
                        <h5 class="text-center"><?= date('d-m-Y', strtotime($date)) ?></h5>
                        <?php
                        foreach ($events as $event) {
                            if (date('Y-m-d', strtotime($event->getEventDate())) == $date) {
                        ?>
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title
                                        "><?= $event->getVenue()->getName() ?></h5>
                                        <p class="card-text">Start time: <?= date('H:i', strtotime($event->getEventDate())) ?></p>
                                        <p class="card-text"><?= $event->getDuration() ?> minutes</p>
                                        <p class="card-text">&euro; <?= $event->getPrice() ?>&comma;&dash;</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/music/event?id=<?= $event->getId() ?>" class="btn btn-sm btn-outline-secondary">Buy Ticket</a>
                                            </div>
                                            <small class="text-muted
                                        "><?= $event->getAvailableTickets() ?> tickets available</small>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">All Access</h5>
                                <a href="/music/event?id=<?= $event->getId() ?>" class="btn btn-sm btn-outline-secondary disabled">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
</body>
<script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {
                lat: 52.387388,
                lng: 4.646219
            },
            disableDefaultUI: true
        });

        var geocoder = new google.maps.Geocoder();

        var venues = {
            <?php
            foreach ($events as $event) {
                echo json_encode($event->getVenue()->getName()) . ": " . json_encode($event->getVenue()->getAddress()) . ",";
            }
            ?>
        };

        for (var venue in venues) {
            if (venues.hasOwnProperty(venue)) {
                geocodeAddress(geocoder, map, venues[venue], venue);
            }
        }

        function geocodeAddress(geocoder, resultsMap, address, label) {
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        label: label
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    }

    initMap();
</script>

</html>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>