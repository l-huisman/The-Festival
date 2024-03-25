<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
  <form class="my-3" action="/resetPassword/resetPassword" method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
      </div>
    </div>
    <input type="submit" class="btn btn-primary" name="buttonReset" value="Send">
  </form>
</div>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>