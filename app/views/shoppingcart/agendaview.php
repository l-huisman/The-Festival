<?php
require_once __DIR__ . '/../../views/elements/header.php';

?>

<style>
</style>

<div class="container">

    <div class="page-header">
        <h1>Calendar view</h1>
    </div>

    <?php print $calendar; ?>

    <a href="shoppingcart/index" class="btn btn-info">List view</a>

</div>



<?php 
require_once __DIR__ . '/../../views/elements/footer.php';
?>