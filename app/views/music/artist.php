<!DOCTYPE html>
<html lang="en">

<head>
    <title>Music + <?= $artist->getName(); ?></title>
</head>

<body>
    <main>
        <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary border rounded-3 text-light " style="background-image: url(<?= $artist->getBanner(); ?>); background-size: 100%;">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold"><?= $artist->getName(); ?></h1>
                    <p class="col-md-8 fs-5"><?= $artist->getDescription(); ?></p>
                    <button class="btn btn-light btn-lg" type="button">Book Ticket</button>
                </div>
            </div>
            <div class="row align-items-md-stretch h-25">
                <div class="col-md-4">
                    <?php
                    foreach ($artist->getSongs() as $song) {
                    ?>
                        <div class="h-100 mi-auto p-5 bg-body-tertiary border rounded-3 text-light" style="background-image: url(<?= $song->getCover(); ?>); background-size: 100%;">
                            <audio>
                                <source src="<?= $song->getSong(); ?>" type="audio/mpeg">
                            </audio>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>