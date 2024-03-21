<?php
require_once __DIR__ . '/../../elements/header.php';
?>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Historyevents <b>overview</b></h2>
                        </div>
                        <div class="col-sm-4">
                        <form method = "POST" action = "">
                
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameInput" name="name">
                </div>
                <button type="createpage" class="btn btn-primary" id = "btnCreatePage">Create Page</button>
            </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historic_overview as $overview): ?>
                            
                            <tr>
                                <td>
                                    <?php echo $overview->getId(); ?>
                                </td>
                                <td>
                                    <?php echo $overview->getName(); ?>
                                </td>
                                <td>
                                    <?php echo $overview->getDescription(); ?>
                                </td>
                                <td>
                                    <?php echo $overview->getLocation(); ?>
                                </td>

                                <td>
                                    <a href='/historic/editHistoricEvent?id=<?php echo $overview->getId(); ?>'
                                        class='btn btn-primary'>edit</a>
                                        <a href='/historic/deleteHistoricEvent?id=<?php echo $overview->getId(); ?>' class='btn btn-danger' onclick="return confirmDelete('<?php echo $overview->getName(); ?>')">delete</a>                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>


</body>
<script>
    function confirmDelete(pageName) {
        return confirm("Are you sure you want to delete the page '" + pageName + "'?");
    }
</script>
<?php
require_once __DIR__ . '/../../elements/footer.php';
?>
