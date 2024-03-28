<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<body>
    <h1 class="d-flex justify-content-center">Edit Historic Event</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/historic/updateHistoricEvent" method="POST">
                    <input type="hidden" name="historicevent_id" value=<?= $event->getId(); ?>>
                    <div class="mb-3">
                        <label for="text" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<? echo $event->getName(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            required><?php echo $event->getDescription(); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="path" class="form-label">Image</label>
                        <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="path"
                            name="path" value="<? echo $event->getPath(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            value="<? echo $event->getLocation(); ?>" required>
                    </div>
                    <button type="submit" name="addHistoricEvent" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="/historic/historyOverview">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
require_once __DIR__ . '/../../elements/footer.php';
?>