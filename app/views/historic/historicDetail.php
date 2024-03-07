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

<h1 class="display-5 fw-bold"><?= $event->getName(); ?></h1>
<h1 class="display-5 fw-bold"><?= $event->getDescription(); ?></h1>



<div class="container w-20 mt-5">
  <!-- Dropdowns -->
  <div class="form-group">
    <label for="dropdown1">Welke dag:</label>
    <select class="form-control" id="dropdown1" onchange="checkDropdowns()">
      <option value="">Kies dag</option>
      <option value="option1">Donderdag</option>
      <option value="option2">Vrijdag</option>
      <option value="option3">Zaterdag</option>
    
    </select>
  </div>

  <div class="form-group">
    <label for="dropdown2">Tijd:</label>
    <select class="form-control" id="dropdown2" onchange="checkDropdowns()">
      <option value="">Kies tijd</option>
      <option value="optionA">10:00</option>
      <option value="optionB">13:00</option>
        <option value="optionC">16:00</option>
      
    </select>
  </div>

  <div class="form-group">
    <label for="dropdown3">Taal:</label>
    <select class="form-control" id="dropdown3" onchange="checkDropdowns()">
      <option value="">Kies taal</option>
      <option value="itemX">Chinees</option>
      <option value="itemY">Engels</option>
      <option value="itemZ">Nederlands</option>
      
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