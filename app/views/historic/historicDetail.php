<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
              <select class="form-control" id="dropdown2" name="tourTime" onchange="checkDropdowns()">
                <option value="">Kies tijd</option>
                <?php foreach ($tour as $t) : ?>
                  <option value="<?= $t->getTime(); ?>"><?= $t->getTime(); ?></option>
                <?php endforeach; ?>
              </select>
            </div>

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

            <input type="submit" value="GOO">
            <button class="btn btn-outline-dark flex-shrink-0 ms-auto" type="button" id="cartbtn" disabled>
              <i class="bi-cart-fill me-1"></i>
              Add to cart
            </button>
          </form>
        </div>
        <input type="hidden" id="selectedDatetime" name="selectedDatetime" value="">
      </div>
      <div class="project-info-box mt-4 mb-0">
        <p class="mb-0">
          <span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
          <a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i class="fab fa-facebook-f"></i></a>
          <a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i class="fab fa-twitter"></i></a>
          <a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i class="fab fa-pinterest"></i></a>
          <a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i class="fab fa-linkedin-in"></i></a>
        </p>
      </div>
    </div>
  </div>
  </div>


 



  </div>


  <<script>
    function checkDropdowns() {

    var dropdown1 = document.getElementById("dropdown1").value;
    var dropdown2 = document.getElementById("dropdown2").value;
    var dropdown3 = document.getElementById("dropdown3").value;


    var dateTimeString = dropdown3 + " " + dropdown2;

    // Set the value of the hidden input field
    document.getElementById("selectedDatetime").value = dateTimeString;

    console.log(dateTimeString);
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