<?php
require_once __DIR__ . '/../elements/header.php';
?>

<div class="container mt-2">
    <h2>Events</h2>
    <p>Press on the fields to change the values within and press edit to update the fields</p>
    <table class="table">
        <thead>
            <tr>
                <th>Available Tickets</th>
                <th>Event Date</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Artists</th>
                <th>Venue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event) { ?>
                <tr>
                    <form action="/admin/updateEvent" method="post">
                        <td><input type="number" name="availableTickets" value="<?php echo $event->getAvailableTickets(); ?>"></td>
                        <td><input type="datetime-local" name="eventDate" value="<?php echo $event->getEventDate(); ?>"></td>
                        <td><input type="number" name="duration" value="<?php echo $event->getDuration(); ?>"></td>
                        <td><input type="number" name="price" value="<?php echo $event->getPrice(); ?>"></td>
                        <td>
                            <select name="artistId[]" size="" multiple>
                                <?php foreach ($artists as $artist) { ?>
                                    <option value="<?php echo $artist->getId(); ?>" <?php echo in_array($artist->getId(), $event->getArtistIds()) ? 'selected' : ''; ?>><?php echo $artist->getName(); ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select name="venueId">

                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $event->getId(); ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="/admin/deleteEvent?id=<?php echo $event->getId(); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </form>
                </tr>
            <?php } ?>
            <tr>
                <form action="/admin/createEvent" method="post">
                    <td><input type="number" name="availableTickets" min="0"></td>
                    <td><input type="datetime-local" name="eventDateTime"></td>
                    <td><input type="number" name="duration" min="0"></td>
                    <td><input type="number" name="price" min="0"></td>
                    <td>
                        <select name="artistId[]" size="" multiple>
                            <?php foreach ($artists as $artist) { ?>
                                <option value="<?php echo $artist->getId(); ?>"><?php echo $artist->getName(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select name="venueId">
                            <?php foreach ($venues as $venue) { ?>
                                <option value="<?php echo $venue->getId(); ?>"><?php echo $venue->getName(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">Create</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
</div>