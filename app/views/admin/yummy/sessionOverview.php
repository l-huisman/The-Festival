<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container"> 
    <h1>Overview Sessions</h1>  
    <a href="/yummy/addSession" class="btn btn-success">Add</a>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Date and time</th>
                <th scope="col">Duration</th>
                <th scope="col">Seats reserved</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessionsList as $session) {?>
                <tr>
                    <td><?= $session->getName() ?></td>
                    <td><?= $session->getDate() ?></td>
                    <td><?= $session->getDuration() ?></td>
                    <td><?= $session->getSeats_reserved() ?></td>
                    <td><a href="/yummy/editSession?id=<?= $session->getSession_id() ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="/yummy/deleteSession?id=<?= $session->getSession_id() ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>