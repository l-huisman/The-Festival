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
                                foreach ($artists as $artist) {
                                    $selected = '';
                                    foreach ($event->getArtists() as $eventArtist) {
                                        if ($artist->getId() == $eventArtist->getId()) {
                                            $selected = 'selected';
                                        }
                                    }
                                ?>
                                    <option value="<?= $artist->getId(); ?>" <?= $selected; ?>><?= $artist->getName(); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="venueId">
                                <?php foreach ($venues as $venue) { ?>
                                    <option value="<?= $venue->getId(); ?>" <?php if ($venue->getId() == $event->getVenue()->getId()) echo 'selected'; ?>><?= $venue->getName(); ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?= $event->getId(); ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="submit" class="btn btn-danger" formaction="/admin/deleteEvent">Delete</button>
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