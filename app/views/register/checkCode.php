<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
  <form class="my-3" action="/resetPassword/checkCode" method="POST">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="email">Enter your code</label>
          <input type="number" class="form-control" name="code" id="code" placeholder="Code" minlength="6" maxlength="6">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="buttonCheck">Submit</button>
  </form>
</div>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>