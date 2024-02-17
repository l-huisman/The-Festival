<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
  <form class="my-3" action="/register/login" method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
      </div>
      <p class="small">Don't have an account press <a href="/register">Here</a></p>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>