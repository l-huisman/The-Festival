<?php

namespace Models;

class Event
{
    private $id;
    private $availableTickets;
    private $eventDate;
    private $duration;
    private $price;
    private $venue;
    private $artists;

    public function __construct($id, $availableTickets, $eventDate, $duration, $price, $venue)
    {
        $this->id = $id;
        $this->availableTickets = $availableTickets;
        $this->eventDate = $eventDate;
        $this->duration = $duration;
        $this->price = $price;
        $this->venue = $venue;
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

    public function getVenue()
    {
        return $this->venue;
    }

    public function getArtists()
    {
        return $this->artists;
    }

    public function setArtists($artists)
    {
        $this->artists = $artists;
    }

    public function addArtist($artist)
    {
        $this->artists = $artist;
    }
}
