<?php

namespace Controllers;

use Services\MusicService;
use Services\ShoppingCartService;

class MusicController
{
    private $service;
    private $shoppingCartService;

    public function __construct()
    {
        $this->service = new MusicService();
        $this->shoppingCartService = new ShoppingCartService();
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
        $artist_events = $this->service->getEventsByArtistID($artist_id);
        require_once __DIR__ . '/../views/music/artist.php';
    }

    public function event()
    {
        $event_id = $_POST['event_id'];
        $event = $this->shoppingCartService->addMusicTicket($event_id);
        header('Location: /music');
    }

    public function allAccessEvent()
    {
        $date = $_POST['date'];
        $price = $_POST['price'];
        $event_id = $_POST['event_id'];
        $event = $this->shoppingCartService->addAllAccessMusicTicket($event_id, $date, $price);
        header('Location: /music');
    }
}
