<?php

namespace Repositories;

class EventRepository extends Repository
{
    public function getEvents()
    {
        $sql = "SELECT * FROM music_event";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEventById($id)
    {
        $sql = "SELECT * FROM music_event WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getArtistsByEventId($event_id)
    {
        $sql = "SELECT artist.id, artist.name FROM artist_event JOIN artist ON artist.id = artist_event.artist_id WHERE artist_event.event_id = :event_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEventsByArtistId($artist_id)
    {
        $sql = "SELECT music_event.id, music_event.available_tickets, music_event.time, music_event.duration, music_event.price, music_event.venue_id FROM artist_event JOIN music_event ON artist_event.event_id = music_event.id WHERE artist_event.artist_id = :artist_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createEvent($available_tickets, $time, $duration, $price, $venue_id, $artistIds)
    {
        $sql = "INSERT INTO music_event (available_tickets, time, duration, price, venue_id) VALUES(:available_tickets, :time, :duration, :price, :venue_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':available_tickets', $available_tickets);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':venue_id', $venue_id);
        $stmt->execute();

        $eventId = $this->connection->lastInsertId();
        $this->insertArtistEvent($artistIds, $eventId);
    }

    public function updateEvent($id, $available_tickets, $time, $duration, $price, $venue_id, $artistIds)
    {
        $sql = "UPDATE music_event SET available_tickets = :available_tickets, time = :time, duration = :duration, price = :price, venue_id = :venue_id WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':available_tickets', $available_tickets);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':venue_id', $venue_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $this->updateArtistEvent($id, $artistIds);
    }

    public function deleteEvent($id)
    {
        $sql = "DELETE FROM artist_event WHERE event_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $sql = "DELETE FROM music_event WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    private function updateArtistEvent($event_id, $artist_ids){
        $current_artists = $this->getArtistsByEventId($event_id);
        $current_artist_ids = array_map(function ($artist) { return $artist['id']; }, $current_artists);
        $artists_to_add = array_diff($artist_ids, $current_artist_ids);
        $artists_to_remove = array_diff($current_artist_ids, $artist_ids);

        foreach ($artists_to_remove as $artist_id) {
            $this->removeArtistEvent($event_id, $artist_id);
        }

        foreach ($artists_to_add as $artist_id) {
            $this->insertArtistEvent([$artist_id], $event_id);
        }
    }

    private function insertArtistEvent($artistIds, $eventId)
    {
        $sql = "INSERT INTO artist_event (artist_id, event_id) VALUES(:artist_id, :event_id)";
        $stmt = $this->connection->prepare($sql);
        foreach ($artistIds as $artistId) {
            $stmt->bindParam(':artist_id', $artistId);
            $stmt->bindParam(':event_id', $eventId);
            $stmt->execute();
        }
    }

    private function removeArtistEvent($eventId)
    {
        $sql = "DELETE FROM artist_event WHERE event_id = :event_id AND artist_id = :artist_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':event_id', $eventId);
        $stmt->bindParam(':artist_id', $artistId);
        $stmt->execute();
    }
}