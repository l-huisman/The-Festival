<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<h1 class="d-flex justify-content-center">Add session</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/yummy/addSession" method="POST">
                <div class="mb-3">
                    <label for="text" class="form-label">Restaurant</label>
                    <select class="form-select" name="restaurant_id" required>
                        <?php foreach($restaurantList as $restaurant) : ?>
                            <option value="<?= $restaurant->getRestaurant_id() ?>"><?= $restaurant->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                <label for="text" class="form-label">Date and time</label>
                <input type="datetime-local" class="form-control" name="dateTime" required>
                </div>

                <div class="mb-3">
                <label for="text" class="form-label">Duration</label>
                <input type="time" class="form-control" name="duration" required>
                </div>

                <button type="submit" name="addSession" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="/yummy/sessionOverview">Back</a>
            </form>
        </div>
    </div>
</div>