<?php
require_once __DIR__ . '/../elements/header.php';
?>

<style>
    td {
        vertical-align: middle;
    }
</style>

<div class="container mt-2">
    <h2>Venues</h2>
    <p>Press on the fields to change the values within</p>
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
                    <td contenteditable="true"><?php echo $venue->getName(); ?></td>
                    <td contenteditable="true"><?php echo $venue->getAddress(); ?></td>
                    <td>
                        <a href="/admin/updateVenue?id=<?php echo $venue->getId(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/deleteVenue?id=<?php echo $venue->getId(); ?>" class="btn btn-danger">Delete</a>
                    </td>
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