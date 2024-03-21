<?php
require_once __DIR__ . '/../elements/header.php';
?>

<style>
    td {
        vertical-align: middle;
        width: auto;
    }

    input[type="text"] {
        height: 100%;
        border: none;
    }

    textarea {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

<div class="container mt-2">
    <h2>Artists</h2>
    <p>Press on the fields to change the values within and press edit to update the fields</p>
    <table class="table">
        <thead>
            <tr>
                <th>Artist</th>
                <th>Description</th>
                <th>Banner</th>
                <th>Pictogram</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $artist) { ?>
                <tr>
                    <form action="/admin/updateArtist" method="post">
                        <td><input type="text" name="name" value="<?php echo $artist->getName(); ?>"></td>
                        <td>
                            <textarea id="description" name="description"><?php echo $artist->getDescription(); ?></textarea>
                        </td>
                        <td>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <label for="banner">
                                    <img src="<?php echo $artist->getBanner(); ?>" alt="Banner" style="width: 100px; height: 100px;">
                                </label>
                                <input type="file" id="banner" name="banner" style="display: none;">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </td>
                        <td>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <label for="pictogram">
                                    <img src="<?php echo $artist->getPictogram(); ?>" alt="Pictogram" style="width: 100px; height: 100px;">
                                </label>
                                <input type="file" id="pictogram" name="pictogram" style="display: none;">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $artist->getId(); ?>">
                            <input class="btn btn-primary" type="submit" value="Edit">
                            <input class="btn btn-danger" type="submit" formaction="/admin/deleteArtist" value="Delete" onclick="return confirm('Are you sure you want to delete this artist?')">
                        </td>
                    </form>
                </tr>
            <?php } ?>
            <tr>
                <form action="/admin/createArtist" method="post">
                    <td><input type="text" name="name" placeholder="Enter artist name"></td>
                    <td><input type="text" name="description" placeholder="Enter artist description"></td>
                    <td>Available after creation</td>
                    <td>Available after creation</td>
                    <td><input class="btn btn-success" type="submit" value="Create"></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>