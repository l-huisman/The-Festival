<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historic</title>
    <link rel="stylesheet" href="../styles/historic.css">
</head>
<body>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
    <div class="col-md-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fw-bold">Historic events in Haarlem</h1>
      <h3 class="fw-normal text-muted mb-3">Geniet een dag van de culturele en prachtige geschiedenis van Haarlem </h3>
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
        <a class="icon-link" href="#">
          Learn more
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
        <a class="icon-link" href="#">
          Buy
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom" style="text-align:center;">Meest populaire evenementen</h2>


  </div>

  <div class="events_area">
    <div class="container">
    <div class="row">
    <div class="row">
    <?php foreach ($historic as $h): ?>
        <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
                <div class="event_thumb">
                    <img src="<?= $h['path'] ?>" class="img-fluid" alt="" />
                </div>
                <div class="event_details">
                    <div class="d-flex mb-4">
                        <div class="date"><span>15/18</span> Jun</div>
                        <div class="time-location">
                            <p><span class="ti-time mr-2"></span><?= $h['name'] ?> </p>
                            <p><span class="ti-location-pin mr-2"></span> </p>
                        </div>
                    </div>
                    <p><?= $h['description'] ?></p>
                    <a href="/historic/historicdetail?id=<?= $h['historicevent_id'] ?>" class="btn btn-primary rounded-0 mt-3">View Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</div>
</body>
</html>

<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>