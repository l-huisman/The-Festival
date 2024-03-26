<?php

namespace Services;

use Repositories\ArtistRepository;
use Repositories\EventRepository;
use Repositories\SongRepository;

use Models\Artist;
use Models\Event;
use Models\Song;

class MusicService
{
    private $songRepository;
    private $eventRepository;
    private $artistRepository;

    public function __construct()
    {
        $this->songRepository = new SongRepository();
        $this->eventRepository = new EventRepository();
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
            $events[] = new Event($event["id"], $event['availableTickets'], $event['eventDate'], $event['duration'], $event['price'], $event['artistId'], $event['venueId']);
        }
        return $events;
    }

    public function getEventById($id)
    {
        $data = $this->eventRepository->getEventById($id);
        return new Event($data["id"], $data['availableTickets'], $data['eventDate'], $data['duration'], $data['price'], $data['artistId'], $data['venueId']);
    }
}
