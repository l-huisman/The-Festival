<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Music + <?= $artist->getName(); ?></title>
</head>

<body>
    <main>
        <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary border rounded-3 text-light" style="background-image: url(<?= $artist->getBanner(); ?>); background-size: 100%;">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold"><?= $artist->getName(); ?></h1>
                    <p class="col-md-8 fs-5"><?= $artist->getDescription(); ?></p>
                    <a class="btn btn-light btn-lg" href="#events">Book Ticket</a>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between col-md-4 w-100 gap-3" style="height: 26rem">
                <?php
                $songs = $artist->getSongs();
                foreach ($songs as $song) {
                ?>
                    <div class="w-100 h-100 p-5 bg-body-tertiary border rounded-3 text-light d-flex justify-content-center align-items-center text-center" style="background-image: url(<?= $song->getCover(); ?>); background-size: 100%;" onclick="playAudio('myAudio<?= $song->getId(); ?>')">
                        <audio id="myAudio<?= $song->getId(); ?>">
                            <source src="<?= $song->getSong(); ?>" type="audio/mpeg">
                        </audio>
                        <div class="container-fluid py-5">
                            <h1 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Click me!</h1>
                        </div>
                    </div>
                    <script src="/js/player.js"></script>
                <?php
                }
                ?>
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
                        foreach ($artist_events as $event) {
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

</html>
<!-- <?php
        require_once __DIR__ . '/../../views/elements/footer.php';
        ?> -->