<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
    <h1>Manage Account</h1>
    <form action="/user/validateUser" method="POST">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><input type="text" name="newFirstName" value="<?=$user->first_name;?>"></td>
                    <td><input type="text" name="newLastName" value="<?=$user->last_name;?>"></td>
                    <td><input type="date" name="newDateOfBirth" value="<?=$user->date_of_birth;?>"></td>
                    <td><input type="text" name="newAddress" value="<?=$user->address;?>"></td>
                    <td><input type="text" name="newPhoneNumber" value="<?=$user->phone_number;?>"></td>
                
                </tr>


            </tbody>
        </table>
        <button class="btn btn-success">Confirm</button>

    </form>

</div>