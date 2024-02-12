<!DOCTYPE html>
<html lang="en">

<head>
    <title>Music + <?= $artist->getName(); ?></title>
</head>

<body>
    <main>
        <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary border rounded-3 text-light " style="background-image: url(/img/artists/hardwell/banner.png); background-size: 100%;">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold"><?= $artist->getName(); ?></h1>
                    <p class="col-md-8 fs-5"><?= $artist->getDescription(); ?></p>
                    <button class="btn btn-primary btn-lg" type="button">Book Ticket</button>
                </div>
            </div>
            <div class="row align-items-md-stretch">
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Change the background</h2>
                        <p>Swap the background-color utility and add a `.text-*` color
                            utility to mix up the jumbotron look. Then, mix and match with
                            additional component themes and more.</p>
                        <button class="btn btn-outline-light" type="button">Play song</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Add borders</h2>
                        <p>Or, keep it light and add a border for some added
                            definition to the boundaries of your content. Be sure to look under the
                            hood at the source HTML here as we've adjusted the alignment and sizing
                            of both column's content for equal-height.</p>
                        <button class="btn btn-outline-secondary" type="button">Play song</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Add borders</h2>
                        <p>Or, keep it light and add a border for some added
                            definition to the boundaries of your content. Be sure to look under the
                            hood at the source HTML here as we've adjusted the alignment and sizing
                            of both column's content for equal-height.</p>
                        <button class="btn btn-outline-secondary" type="button">Play song</button>
                    </div>
                </div>
            </div>
        </div>
    </main>