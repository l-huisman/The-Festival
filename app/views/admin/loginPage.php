<?php
require_once __DIR__ . '/../../views/elements/header.php';

if(isset($_GET['errorMessage'])){
  $errorMessage = htmlspecialchars($_GET['errorMessage']); ?>
  <script>alert("<?=$errorMessage;?>");</script>
<?php } ?>

<div class="container">
  <form class="my-3" action="/admin/login" method="POST">
    <div class="row">
    <h2>Admin Login</h2>
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
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>
<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>