<?php
require_once __DIR__ . '/../elements/header.php';
?>

<div class="container mt-2">
    <h2>Events</h2>
    <p>Press on the fields to change the values within and press edit to update the fields, make sure to hold ctrl for windows when selecting an artist and command for mac</p>
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
                        <td><input type="number" name="availableTickets" value="<?= $event->getAvailableTickets(); ?>"></td>
                        <td><input type="datetime-local" name="eventDate" value="<?= $event->getEventDate(); ?>"></td>
                        <td><input type="number" name="duration" value="<?= $event->getDuration(); ?>"></td>
                        <td><input type="number" name="price" value="<?= $event->getPrice(); ?>"></td>
                        <td>
                            <select name="artistId[]" size="3" multiple>
                                <?php 
                                    $artistIds = $event->getArtists() ? array_map(function($artist) { return $artist->getId(); }, $event->getArtists()) : [];
                                    foreach ($artists as $artist) { ?>
                                        <option value="<?php echo $artist->getId(); ?>" <?php if (in_array($artist->getId(), $artistIds)) echo 'selected'; ?>><?php echo $artist->getName(); ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select name="venueId">
                                <?php foreach ($venues as $venue) { ?>
                                    <option value="<?= $venue->getId(); ?>" <?php if ($venue->getId() == $event->getVenueId()) echo 'selected'; ?>><?= $venue->getName(); ?></option>
                                <?php } ?>
                            </select>
                        <td>
                            <input type="hidden" name="id" value="<?= $event->getId(); ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="/admin/deleteEvent?id=<?= $event->getId(); ?>" class="btn btn-danger">Delete</a>
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
                        <select name="artistId[]" size="3" multiple>
                            <?php foreach ($artists as $artist) { ?>
                                <option value="<?= $artist->getId(); ?>"><?= $artist->getName(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select name="venueId">
                            <?php foreach ($venues as $venue) { ?>
                                <option value="<?= $venue->getId(); ?>"><?= $venue->getName(); ?></option>
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