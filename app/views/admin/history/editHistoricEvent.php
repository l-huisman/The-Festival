
<form action="/historic/updateHistoricEvent" method="POST">
    <input type="hidden" name="historicevent_id" value=<?=$event->getId();?>>
    <input type="text" name="name" placeholder="Name">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="text" name="path" placeholder="Path">
    <input type="text" name="location" placeholder="Location">
    
    <input type="submit" value="Submit">
</form>
</div>