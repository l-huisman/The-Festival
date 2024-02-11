<div class="container">
  <form class="my-3" action="/register/validateUser" method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First name">
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last name">
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
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control" name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
      </div>
    </div>
    <p class="small">Already have an account press <a href="/register/loginView">Here</a></p>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>