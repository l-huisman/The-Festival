<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<body>
  <h1 class = "d-flex justify-content-center">New Restaurant</h1>

  <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/yummy/addRestaurant" method="POST">
        <div class="mb-3">
          <label for="text" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Description</label>
          <input type="textarea" class="form-control" id="description" name="description" value="" required>
        </div>
        <div class="mb-3">
          <label for="number" class="form-label">Price adults</label>
          <input type="number" step="0.01" min="1" class="form-control" id="price" name="price" value="" required>
        </div>
        <div class="mb-3">
          <label for="number" class="form-label">Price kids</label>
          <input type="number" step="0.01" min="1" class="form-control" id="price" name="price_kids" value="" required>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Star rating</label>
          <select class="form-select" id="star_rating" name="star_rating" multiple required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="2">4</option>
            <option value="3">5</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cuisine" class="form-label">Cuisine</label>
          <input type="text" minlength="2" class="form-control" id="cuisine" name="cuisine" value="" required>
        </div>
        <div class="mb-3">
          <label for="website" class="form-label">Website</label>
          <input type="text" minlength="4" class="form-control" id="website" name="website" value="" required>
        </div>
        <div class="mb-3">
          <label for="phonenumber" class="form-label">Phonenumber</label>
          <input type="tel" minlength="10" maxlength="10" class="form-control" id="phonenumber" name="phonenumber" value="" required>
        </div>
        <div class="mb-3">
          <label for="total_seats" class="form-label">Total seats</label>
          <input type="number" min="1" class="form-control" id="total_seats" name="total_seats" value="" required>
        </div>

        <div class="mb-3">
            <label for="header_image" class="form-label">Header image</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="header_image" name="header_image" value="" required>
        </div>
        <div class="mb-3">
            <label for="restaurant_image" class="form-label">Restaurant image</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="restaurant_image" name="restaurant_image" value="" required>
        </div>
        <div class="mb-3">
            <label for="menu_image" class="form-label">Menu image</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="menu_image" name="menu_image" value="" required>
        </div>

        <div class="mb-3">
          <label for="streetname" class="form-label">Streetname</label>
          <input type="text" class="form-control" id="streetname" name="streetname" value="" required>
        </div>
        <div class="mb-3">
          <label for="postalcode" class="form-label">Postalcode</label>
          <input type="text" minlength="6" class="form-control" id="postalcode" name="postalcode" placeholder="1234AB" value="" required>
        </div>
        <div class="mb-3">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city" placeholder="" value="" required>
        </div>
        <div class="mb-3">
          <label for="housenumber" class="form-label">Housenumber</label>
          <input type="text" minlength="1" class="form-control" id="housenumber" name="housenumber" placeholder="" value="" required>
        </div>

        <button type="submit" name="addRestaurant" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="/yummy/restaurantOverview">Back</a>
        
      </form>
    </div>
  </div>
</div>
</body>
