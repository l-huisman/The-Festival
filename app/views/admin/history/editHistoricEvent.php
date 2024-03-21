<!-- <div class="container">
  <form class="my-3" action="/historic/updateHistoricEvent" method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" id="description" placeholder="Description">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="dateOfBirth">Date of birth</label>
          <input type="date" name="dateOfBirth" class="form-control" id="dateOfBirth">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Address">
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="phoneNumber">Phone number</label>
          <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone number">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
      </div>
    
    </div> -->
   

    <!-- <button type="submit" class="btn btn-primary">Submit</button>
  </form> -->


  <form action="/historic/updateHistoricEvent" method="POST">
    <input type="hidden" name="historicevent_id" value=<?=$event->getId();?>>
    <input type="text" name="name" placeholder="Name">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="text" name="path" placeholder="Path">
    <input type="text" name="location" placeholder="Location">
    
    <input type="submit" value="Submit">
</form>
</div>