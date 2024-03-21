<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> hoi</title>
</head>

<body>

  <div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
      <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $event->getPath(); ?>" alt=""></div>
      <div class="col-md-6">
        <div class="small mb-1"><?= $event->getLocation(); ?></div>
        <h1 class="display-5 fw-bolder"><?= $event->getName(); ?></h1>
        <div class="fs-5 mb-5">

          <span>$40.00</span>
        </div>
        <p class="lead"><?= $event->getDescription(); ?></p>
        <div class="d-flex">

        </div>
        <form action="/historic/test" method="POST">

      
        <div class="form-group me-3">
            <select class="form-control" id="dropdown1" name="guide" onchange="checkDropdowns()">
              <option value="">Kies Guide</option>
              <?php
              $uniqueGuideNames = array_unique(array_map(function ($t) {
                return $t->getGuideName();
              }, $tour));

              foreach ($uniqueGuideNames as $guideName) :
              ?>
                <option value="<?= $guideName; ?>"><?php echo $guideName; ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <div class="form-group me-3">
            <select class="form-control mt-2" id="dropdown2" name="tourTime" onchange="checkDropdowns()">
              <option value="">Kies Tijd</option>
           
            </select>
          </div>

          <input class= "mt-4" type="submit" value="Book ticket">
          <!-- <button class="btn btn-outline-dark flex-shrink-0 ms-auto" type="button" id="cartbtn" disabled>
            <i class="bi-cart-fill me-1"></i>
            Add to cart
          </button> -->
        </form>
      </div>
      <input type="hidden" id="selectedDatetime" name="selectedDatetime" value="">
    </div>
    <div class="project-info-box mt-2 mb-0">
      <p class="mb-0">
        <span class="fw-bold mr-2 va-middle hide-mobile">Share:</span>
        <a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i class="fab fa-facebook-f"></i></a>
        <a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i class="fab fa-twitter"></i></a>
        <a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i class="fab fa-pinterest"></i></a>
        <a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i class="fab fa-linkedin-in"></i></a>
      </p>
    </div>
  </div>

  <script>
    function checkDropdowns() {
    var guideDropdown = document.getElementById('dropdown1');
    var timeDropdown = document.getElementById('dropdown2');
   var timetable = <?php echo json_encode($tourdate); ?>;
   var guideTime = [];
    if (guideDropdown.value !== '') {

    timeDropdown.disabled = false;
    guidetime = timetable[guideDropdown.value];

    for (var i = 0; i < guidetime.length; i++) {
      var option = document.createElement('option');
      option.value = guidetime[i];
      option.text = guidetime[i];
      timeDropdown.appendChild(option);
    }
    // Enable time dropdown
    } else {
    timeDropdown.disabled = true; // Disable time dropdown
    }
  
    // Get the button element
    var cartButton = document.getElementById("cartbtn");
    cartButton.disabled = true;

    // Check if all three dropdowns have values selected
    if (dropdown1 !== "" && dropdown2 !== "" && dropdown3 !== "") {
    // Enable the button
    cartButton.disabled = false;
    } else {
    // Disable the button
    cartButton.disabled = true;
    }
    }

    window.onload = function() {
    checkDropdowns(); // Check dropdowns and set button state initially
    };
    </script>

</body>

</html>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>