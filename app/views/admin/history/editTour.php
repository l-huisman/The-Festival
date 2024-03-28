<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<body>
  <h1 class = "d-flex justify-content-center">Edit Tour</h1>
  <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/historic/updateTour" method="POST">
      <div class="mb-3">
      <input type="hidden" name="guide_id" value=<?=$tour->getGuideId();?>>
      <input type="hidden" name="tour_id" value=<?=$tour->getTour();?>>

          <label for="text" class="form-label">Start Location</label>
          <input type="text" class="form-control" id="startlocation" name="startlocation" value="<?echo $tour->getStartLocation();?>" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Price</label>
          <input type="number" step= "0.01" min = "0" class="form-control" id="price" name="price"  value="<?echo $tour->getPrice();?>" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Seats</label>
          <input type="number" min= "1" class="form-control" id="seats" name="seats" value="<?echo $tour->getSeats();?>" required></textarea>
        </div>
        <div class="mb-3">
          <label for="time" class="form-label">Time</label>
          <input type="datetime-local" class="form-control" id="time" name="time" value="<?echo $tour->getTime();?>" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Guide Name</label>
          <input type="text" class="form-control" id="guide" name="guide" value="<?echo $tour->getGuideName();?>" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Language</label>
          <input type="text" class="form-control" id="language" name="language" value="<?echo $tour->getLanguage();?>" required>
        </div>
        <button type="submit" name="editTour" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="/historic/tourOverview">Back</a>
        
      </form>
    </div>
  </div>
</div>
</body>

<?php
require_once __DIR__ . '/../../elements/footer.php';
?>