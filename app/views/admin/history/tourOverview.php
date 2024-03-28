<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<body>
    <div class="container-lg mt-2">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Tour <b>overview</b></h2>
                        </div>
                        <div class="col-sm-4 mt-3">
                        <a href="/historic/addTour" class="btn btn-primary mb-3" id = "btnCreatePage">Add tour</a href>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Start Location</th>
                            <th>Price</th>
                            <th>Seats</th>
                            <th>Time</th>
                            <th>Guide Name</th>
                            <th>Language</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tour as $t): ?>
                            <tr>
                                <td><?php echo $t->getGuideId(); ?></td>
                                <td><?php echo $t->getStartLocation(); ?></td>
                                <td><?php echo $t->getPrice(); ?></td>
                                <td><?php echo $t->getSeats(); ?></td>
                                <td><?php echo $t->getTime(); ?></td>
                                <td><?php echo $t->getGuideName(); ?></td>
                                <td><?php echo $t->getLanguage(); ?></td>
                                <td>
                                    <a href='/historic/editTour?id=<?php echo $t->getTour(); ?>' class='btn btn-primary'>edit</a>
                                    <a href='/historic/deleteTour?id=<?php echo $t->getTour(); ?>' class='btn btn-danger' onclick="return confirmDelete('<?php echo $t->getGuideName(); ?>', '<?php echo $t->getTime(); ?>')">delete</a>                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function confirmDelete(guideName, time) {
        return confirm("Are you sure you want to delete the tour of " + guideName + " at " + time + "?");
    }
</script>

<?php
require_once __DIR__ . '/../../elements/footer.php';
?>
