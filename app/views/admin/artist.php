<?php
require_once __DIR__ . '/../elements/header.php';
?>

<div class="container mt-2">
    <h2>Artists</h2>
    <?php print_r($artists); ?>
    <table class="table">
        <thead>
            <tr>
                <th>Artist</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $artist) : ?>
                <tr>
                    <td><?php echo $artist->name; ?></td>
                    <td><?php echo $artist->genre; ?></td>
                    <td>
                        <a href="/admin/artist/edit?id=<?php echo $artist->id; ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/artist/delete?id=<?php echo $artist->id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/admin/artist/create" class="btn btn-success">Create</a>
</div>