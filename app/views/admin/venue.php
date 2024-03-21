<?php
require_once __DIR__ . '/../elements/header.php';
?>

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
                        <a href="/admin/artist/edit?id=<?php echo $venue->getId(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/artist/delete?id=<?php echo $venue->getId(); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <form action="/admin/artist/create" method="post">
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>