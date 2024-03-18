<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>
<div class="container">
    <h2 class="mt-5">Shopping Cart</h2>
    <form action="/shoppingcart/pay" method="POST">

        <ul class="list-group">
            <?php if(isset($_SESSION['Tickets'])){
                foreach($_SESSION['Tickets'] as $index => $Serialized_ticket) { 
                    $Ticket = unserialize($Serialized_ticket); 
                    $inputName = "quantity".$index;?>
                    <li class="list-group-item mb-2 border d-flex justify-content-between">
                        <span class="w-50"><?= $Ticket->title ?> | <?= $Ticket->description; ?></span> 
                        <span>&euro;<input type="text" class="border-0" id="priceLabel<?=$index;?>" name="PriceLabel<?=$index;?>" readonly value="<?=$Ticket->price * $Ticket->quantity;?>"></span>

                        <span>
                            Quantity: 
                            <input type="hidden" id="ticket<?=$index;?>" value="<?=$Ticket->id?>">
                            <input type="hidden" id="ticketPrice<?=$index;?>" value="<?=$Ticket->price?>">
                            <input class="p-1 border rounded me-2" min="1" max="20" width="100" type="number" id="<?=$inputName;?>" name="<?=$inputName;?>" value="<?= $Ticket->quantity; ?>">
                            <a href="/shoppingcart/remove?ticketID=<?=$Ticket->id?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </span>
                        
                    </li>
                <?php }
            }  ?>
        </ul>
    
        <button class="d-inline btn btn-success">Pay</button>
        <a href="/shoppingcart/Share" class="d-inline btn btn-primary">Share shoppingcart</a>
        <a href="/shoppingcart/agendaView" class="d-inline btn btn-info">Agenda view</a>
    </form>
</div>
<?php 
require_once __DIR__ . '/../../views/elements/footer.php';
?>
<script>
// Select all inputs whose ID starts with "quantity"
var quantityInputs = document.querySelectorAll('input[id^="quantity"]');

var quantities = [];

quantityInputs.forEach(function(input) {
    input.addEventListener("change", () => {
        var index = input.id.replace('quantity', '');
        var ticketID = document.getElementById('ticket' + index).value;
        var ticketPrice = document.getElementById('ticketPrice' + index).value;

        document.getElementById('priceLabel' + index).value = ticketPrice * input.value;

        
        var existingForm = input.nextElementSibling;
        if (existingForm && existingForm.tagName === 'FORM') {
            existingForm.parentNode.removeChild(existingForm);
        }

        let form = document.createElement('form');
        form.action = "/shoppingcart/changeQuantity";
        form.method = "POST";
        form.classList.add('d-inline');

        let inputQuantity = document.createElement("input");
        inputQuantity.type = "hidden";
        inputQuantity.name = "inputQuantity";
        inputQuantity.value = input.value;

        let inputTicketID = document.createElement("input");
        inputTicketID.type = "hidden";
        inputTicketID.name = "inputTicketID";
        inputTicketID.value = ticketID;

        var button = document.createElement('button');
        button.classList.add("btn","btn-warning");
        button.textContent = 'Confirm';

        form.append(inputQuantity);
        form.append(inputTicketID);
        form.append(button);


        input.parentNode.insertBefore(form, input.nextSibling);
    }, false)
    quantities.push(input.value);
});
</script>