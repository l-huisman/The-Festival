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

    public function createEvent($availableTickets, $eventDate, $duration, $price, $venueId, $artistIds)
    {
        $sql = "INSERT INTO music_event (availableTickets, eventDate, duration, price, venueId) VALUES(:available_tickets, :time, :duration, :price, :venue_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':available_tickets', $availableTickets);
        $stmt->bindParam(':time', $eventDate);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':venue_id', $venueId);
        $stmt->execute();

        $eventId = $this->connection->lastInsertId();
        $this->insertArtistEvent($artistIds, $eventId);
    }

    private function insertArtistEvent($artistIds, $eventId)
    {
        $sql = "INSERT INTO artist_event (artistId, eventId) VALUES(:artist_id, :event_id)";
        $stmt = $this->connection->prepare($sql);
        foreach ($artistIds as $artistId) {
            $stmt->bindParam(':artist_id', $artistId);
            $stmt->bindParam(':event_id', $eventId);
            $stmt->execute();
        }
    }
}
