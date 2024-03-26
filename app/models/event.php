<?php

namespace Models;

class Event
{
    private $id;
    private $availableTickets;
    private $eventDate;
    private $duration;
    private $price;
    private $venueId;
    private $artistIds;

    public function __construct($id, $availableTickets, $eventDate, $duration, $price, $venueId)
    {
        $this->id = $id;
        $this->availableTickets = $availableTickets;
        $this->eventDate = $eventDate;
        $this->duration = $duration;
        $this->price = $price;
        $this->venueId = $venueId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAvailableTickets()
    {
        return $this->availableTickets;
    }

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getVenueId()
    {
        return $this->venueId;
    }

    public function getArtistIds()
    {
        return $this->artistIds;
    }

    public function setArtistIds($artistIds)
    {
        $this->artistIds = $artistIds;
    }
}