<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
    <h1>Overview Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total Price</th>
                <th scope="col">Export</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) {?>
                <tr>
                    <td><?= $order->orderID; ?></td>
                    <td><?= $order->userID; ?></td>
                    <td><?= $order->orderDateTime; ?></td>
                    <td><?= $order->totalPrice; ?></td>
                    <td><a href="/shoppingcart/exportOrderInformation?orderID=<?= $order->orderID; ?>" class="btn btn-primary">Export</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>