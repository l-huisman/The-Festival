<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link type = "text/css" rel="stylesheet" href="">

<body>
  <h1 class = "d-flex justify-content-center">Edit session</h1>

  <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/yummy/updateSession" method="POST">
        
        <div class="mb-3">
            <label for="text" class="form-label">Date and time</label>
            <input type="datetime-local" class="form-control" name="dateTime" value="<?=$editSession->getDate()?>" required>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Duration</label>
            <input type="time" class="form-control" name="duration" value="<?=$editSession->getDuration()?>" required>
        </div>
        
        <button type="submit" name="updateSession" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="/yummy/sessionOverview">Back</a>
      </form>
    </div>
  </div>
</div>
</body>
