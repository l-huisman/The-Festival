<?php
require_once __DIR__ . '/../../views/elements/header.php';

?>

<style>
    @media screen and (min-width: 768px) {
        .show{
            width: 100%!important;
        }
    }

    small {
        font-size: 0.7em;
    }

    hr {
        margin-bottom: 0;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="/shoppingcart/changeQuantity" method="POST">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit quantity</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id='inputTicketID' name="inputTicketID">
                    <input type="hidden" name="orgin" value="calendar">
                    <input type="number" id="inputQuantity" name="inputQuantity">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save changes" class="btn btn-primary">
            </div>
        </form>

    </div>
  </div>
</div>



<div class="container">

    <div class="page-header">
        <h1>Calendar view</h1>
    </div>

    <?php print $calendar; ?>

    

</div>



<?php 
require_once __DIR__ . '/../../views/elements/footer.php';
?>

<script>
    //get all the del buttons and open a confirm dialog
    var delButtons = document.querySelectorAll('.del');
    delButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            var result = confirm('Are you sure you want to delete this ticket?');
            if (!result) {
                e.preventDefault();
            }
        });
    });


    var editButtons = document.querySelectorAll('.edit');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            // get a tag above e src Element
            var a = e.srcElement;
            let tagName = a.tagName;
            let parentElement = a.parentElement;
            while (tagName != 'SPAN') {
                a = parentElement;
                tagName = a.tagName;
                parentElement = a.parentElement;
            }
            //get the href attribute of the a tag that is in the same parent a the span tag
            var href = a.parentElement.querySelector('a').getAttribute('href');
            var quantity = a.parentElement.querySelector('#quantity').value;

            var TicketId = href.replace('/shoppingcart/remove?ticketID=', '');

            document.getElementById('inputTicketID').value = TicketId;
            document.getElementById('inputQuantity').value = quantity;

        });
    });
</script>