<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
  <form class="my-3" action="/resetPassword/newPassword" method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="email">New password</label>
          <input type="password" class="form-control" name="password" id="email" placeholder="New password" minlength="8" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="email">Repeat new password</label>
          <input type="password" class="form-control" name="password2" id="email" placeholder="New password" minlength="8" required>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="buttonNewPassword">Submit</button>
  </form>
</div>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>