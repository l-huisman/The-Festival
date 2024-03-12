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

<?php
$hourMin = array(); // Initialize the array outside the loop to store unique values
$dayofWeek = array();


foreach ($tour as $t) {
    $time = new DateTime($t->getTime());
    $hourAndMinutes = $time->format('H:i');
    $dayOfWeekString = $time->format('l');


    // Check if the value already exists in the array
    if (!in_array($hourAndMinutes, $hourMin)) {
        $hourMin[] = $hourAndMinutes; // Add unique value to the array
        
    }

    if (!in_array($dayOfWeekString, $dayofWeek)) {
        $dayofWeek[] = $dayOfWeekString; // Add unique value to the array
    }
}
    sort($hourMin);
    sort($dayofWeek); // Sort the array (optional, if you want the times to be in ascending order
// Now $hourMin contains unique times from the tour dates
?>





<h1 class="display-5 fw-bold"><?= $event->getName(); ?></h1>
<h1 class="display-5 fw-bold"><?= $event->getDescription(); ?></h1>
<h1 class="display-5 fw-bold"><? foreach($tour as $t) echo $t->getSeats() ?></h1>




<div class="container w-20 mt-5">
  <!-- Dropdowns -->
  <div class="form-group">
  
      <select class="form-control" id="dropdown1" onchange="checkDropdowns()">
      <option value="">Kies dag</option>
      <?php foreach($tour as $t): ?>
        <option value=""><?php echo $t->getSeats(); ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
  <select class="form-control" id="dropdown1" onchange="checkDropdowns()">
      <option value="">Kies tijd</option>
      <?php foreach($hourMin as $hm): ?>
        <option value=""><?php echo $hm?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
   <select class="form-control" id="dropdown1" onchange="checkDropdowns()">
      <option value="">Kies datum</option>
      <?php foreach($dayofWeek as $dow): ?>
        <option value=""><?php echo $dow?></option>
      <?php endforeach; ?>
    </select>
  </div>

  

    

  <!-- Button initially hidden -->
  <button id="hiddenButton" class="btn btn-primary" style="display:none;">Show Me</button>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  function checkDropdowns() {
    // Get selected values
    var dropdown1 = document.getElementById("dropdown1").value;
    var dropdown2 = document.getElementById("dropdown2").value;
    var dropdown3 = document.getElementById("dropdown3").value;

    // Check if all three dropdowns have values selected
    if (dropdown1 !== "" && dropdown2 !== "" && dropdown3 !== "" && dropdown4) {
      // Show the button
      document.getElementById("hiddenButton").style.display = "block";
    } else {
      // Hide the button
      document.getElementById("hiddenButton").style.display = "none";
    }
  }
</script>


   
         
               <div class="col-lg-6 col-md-6">
                   <div class="single_event position-relative">
                       <div class="event_thumb">
                           <img src="<? $event->getPath()?> " alt="" />
                       </div>
                       <div class="event_details">
                           <div class="d-flex mb-4">
                               <div class="date"><span>15/18</span> Jun</div>
                               <div class="time-location">
                                   <p><span class="ti-time mr-2"></span> </p>
                                   <p><span class="ti-location-pin mr-2"></span> </p>
                               </div>
                           </div>
                          
                       </div>
                   </div>
               </div>
              
              
           
     

       
</body>
</html>

<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>