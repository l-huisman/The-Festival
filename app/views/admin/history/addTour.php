<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<body>
  <h1 class = "d-flex justify-content-center">New Tour</h1>
  <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/historic/addTour" method="POST">
      <div class="mb-3">
          <label for="text" class="form-label">Start Location</label>
          <input type="text" class="form-control" id="startlocation" name="startlocation" value="" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Price</label>
          <input type="number" step= "0.01" min = "0" class="form-control" id="price" name="price" value="" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Seats</label>
          <input type="number" min= "1" class="form-control" id="seats" name="seats" value="" required></textarea>
        </div>
        <div class="mb-3">
          <label for="time" class="form-label">Time</label>
          <input type="datetime-local" class="form-control" id="time" name="time" value="2018-06-12T19:30" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Guide Name</label>
          <input type="text" class="form-control" id="guide" name="guide" value="" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Language</label>
          <input type="text" class="form-control" id="language" name="language" value="" required>
        </div>
        <button type="submit" name="addTour" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="/historic/tourOverview">Back</a>
        
      </form>
    </div>
  </div>
</div>
</body>

<?php
require_once __DIR__ . '/../../elements/footer.php';
?>