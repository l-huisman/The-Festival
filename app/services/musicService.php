<?php

namespace Services;

use Repositories\ArtistRepository;
use Repositories\SongRepository;
use Models\Artist;
use Models\Song;

class MusicService
{
    private $artistRepository;
    private $songRepository;

    public function __construct()
    {
        $this->artistRepository = new ArtistRepository();
        $this->songRepository = new SongRepository();
    }

    public function getArtists()
    {
        $data = $this->artistRepository->getArtists();
        $artists = [];
        foreach ($data as $artist) {
            $songs = $this->getSongsByArtistId($artist["id"]);
            $artists[] = new Artist($artist["id"], $artist['name'], $artist['description'], $artist['banner'], $artist['pictogram'], $songs);
            $artists[] = $artist;
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
}
