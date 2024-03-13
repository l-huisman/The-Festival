<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
    <h1>Overview Customers</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Gender</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) {?>
                <tr>
                    <td><?= $user->user_id; ?></td>
                    <td><?= $user->first_name; ?></td>
                    <td><?= $user->last_name; ?></td>
                    <td><?= $user->date_of_birth; ?></td>
                    <td><?= $user->address; ?></td>
                    <td><?= $user->phone_number; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->role; ?></td>
                    <td><?= $user->gender; ?></td>
                    <td><a href="/admin/editUserView?user_id=<?= $user->user_id; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="/admin/deleteUser?user_id=<?= $user->user_id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>