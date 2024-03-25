<?php
require_once __DIR__ . '/../elements/header.php';
?>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>CustomePages  <b>editmenu</b></h2>
                        </div>
                        <div class="col-sm-4">
                        <form method = "POST" action = "/custom/create">
                
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

                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allCustomPages as $custom) { ?>
                            <tr>
                                <td>
                                    <?php echo $custom->getId(); ?>
                                </td>
                                <td>
                                    <?php echo $custom->getName(); ?>
                                </td>
                                <td>
                                    <a href='/custom/show?id=<?php echo $custom->getId(); ?>'
                                        class='btn btn-primary'>edit</a>
                                        <a href='/custom/delete?id=<?php echo $custom->getId(); ?>' class='btn btn-danger' onclick="return confirmDelete('<?php echo $custom->getName(); ?>')">delete</a>                                </td>
                            </tr>
                        <?php } ?>
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
require_once __DIR__ . '/../elements/footer.php';
?>