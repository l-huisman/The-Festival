<?php

namespace Controllers;

use Services\MusicService;

class MusicController
{
    public $service;

    public function __construct()
    {
        $this->service = new MusicService();
    }

    public function index()
    {
        $artists = $this->service->getArtists();
        $events = $this->service->getEvents();

        require_once __DIR__ . '/../views/music/music.php';
    }

    public function artist($artist_id)
    {
        $artist = $this->service->getArtistByID($artist_id);
        require_once __DIR__ . '/../views/music/artist.php';
    }

    public function event($event_id)
    {
        //TODO: Implement this method to buy a ticket for an event
    }
}
