<?php
require_once __DIR__ . '/../elements/header.php';
?>

<style>
    td {
        vertical-align: middle;
    }

    input[type="text"] {
        width: 100%;
        border: none;
    }
</style>

<div class="container mt-2">
    <h2>Venues</h2>
    <p>Press on the fields to change the values within and press edit to update the fields</p>
    <table class="table">
        <thead>
            <tr>
                <th>Venue</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venues as $venue) { ?>
                <tr>
                    <form action="/admin/updateVenue" method="post">
                        <td><input type="text" name="name" value="<?php echo $venue->getName(); ?>"></td>
                        <td><input type="text" name="address" value="<?php echo $venue->getAddress(); ?>"></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $venue->getId(); ?>">
                            <input class="btn btn-primary" type="submit" value="Edit">
                            <input class="btn btn-danger" type="submit" formaction="/admin/deleteVenue" value="Delete" onclick="return confirm('Are you sure you want to delete this venue?')">
                        </td>
                    </form>
                </tr>
            <?php } ?>
            <tr>
                <form action="/admin/createVenue" method="post">
                    <td><input type="text" name="name" placeholder="Enter venue name"></td>
                    <td><input type="text" name="address" placeholder="Enter venue location"></td>
                    <td><input class="btn btn-success" type="submit" value="Create"></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>