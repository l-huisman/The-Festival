<?php

namespace Services;

use Repositories\ArtistRepository;
use Repositories\VenueRepository;
use Repositories\EventRepository;
use Repositories\SongRepository;

use Models\Artist;
use Models\Event;
use Models\Song;

class MusicService
{
    private $songRepository;
    private $eventRepository;
    private $venueRepository;
    private $artistRepository;

    public function __construct()
    {
        $this->songRepository = new SongRepository();
        $this->eventRepository = new EventRepository();
        $this->venueRepository = new VenueRepository();
        $this->artistRepository = new ArtistRepository();
    }

    public function getArtists()
    {
        $data = $this->artistRepository->getArtists();
        $artists = [];
        foreach ($data as $artist) {
            $songs = $this->getSongsByArtistId($artist["id"]);
            $artists[] = new Artist($artist["id"], $artist['name'], $artist['description'], $artist['banner'], $artist['pictogram'], $songs);
        }
        return $artists;
    }

    public function getArtistById($id)
    {
        $data = $this->artistRepository->getArtistById($id);
        $songs = $this->getSongsByArtistId($data["id"]);
        $artist = new Artist($data["id"], $data['name'], $data['description'], $data['banner'], $data['pictogram'], $songs);
        return $artist;
    }

    public function createArtist($name, $description, $banner, $pictogram)
    {
        $this->artistRepository->createArtist($name, $description, $banner, $pictogram);
    }

    public function updateArtist($id, $name, $description, $banner, $pictogram)
    {
        $this->artistRepository->updateArtist($id, $name, $description, $banner, $pictogram);
    }

    public function deleteArtist($id)
    {
        $this->artistRepository->deleteArtist($id);
    }

    public function getSongs($artist_id)
    {
        $data = $this->songRepository->getSongs($artist_id);
        $songs = [];
        foreach ($data as $song) {
            $songs[] = new Song($song["id"], $song['song'], $song['cover']);
        }
        return $songs;
    }

    public function getSongsByArtistID($artist_id)
    {
        $data = $this->songRepository->getSongsByArtistId($artist_id);
        $songs = [];
        foreach ($data as $song) {
            $songs[] = new Song($song["id"], $song['song'], $song['cover']);
        }
        return $songs;
    }

    public function getSongById($id)
    {
        $data = $this->songRepository->getSongById($id);
        return new Song($data["id"], $data['song'], $data['cover']);
    }

    public function createSong($artist_id, $song, $cover)
    {
        $this->songRepository->createSong($artist_id, $song, $cover);
    }

    public function updateSong($id, $song, $cover)
    {
        $this->songRepository->updateSong($id, $song, $cover);
    }

    public function deleteSong($id)
    {
        $this->songRepository->deleteSong($id);
    }

    public function getEvents()
    {
        $data = $this->eventRepository->getEvents();
        $events = [];
        foreach ($data as $event) {
            $venue = $this->venueRepository->getVenueById($event["venue_id"]);
            $events[] = new Event($event["id"], $event['available_tickets'], $event['time'], $event['duration'], $event['price'], $venue);
            $artists = $this->eventRepository->getArtistsByEventId($event["id"]);
            foreach ($artists as $artist) {
                $events[count($events) - 1]->addArtist(new Artist($artist["id"], $artist['name']));
            }
        }

        return $events;
    }

    public function getEventById($id)
    {
        $data = $this->eventRepository->getEventById($id);
        $venue = $this->venueRepository->getVenueById($data["venue_id"]);
        return new Event($data["id"], $data['availableTickets'], $data['eventDate'], $data['duration'], $data['price'], $venue);
    }

    public function createEvent($availableTickets, $eventDate, $duration, $price, $artistIds, $venueId)
    {
        $this->eventRepository->createEvent($availableTickets, $eventDate, $duration, $price, $venueId, $artistIds);
    }

    public function updateEvent($id, $availableTickets, $eventDate, $duration, $price, $artistIds, $venueId)
    {
        $this->eventRepository->updateEvent($id, $availableTickets, $eventDate, $duration, $price, $venueId, $artistIds);
    }
}
