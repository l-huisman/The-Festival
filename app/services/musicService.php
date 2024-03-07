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
            $artists[] = new Artist($artist["id"], $artist['name'], $artist['description'], $artist['banner'], $artist['pictogram']);
        }
        return $artists;
    }

    public function getArtistById($id)
    {
        $data = $this->artistRepository->getArtistById($id);
        $artist = new Artist($data["id"], $data['name'], $data['description'], $data['banner'], $data['pictogram']);
        $songs = $this->songRepository->getSongsByArtistId($id);
        foreach ($songs as $song) {
            $artist->addSong(new Song($song["id"], $song['song'], $song['cover']));
        }
        return $artist;
    }
}
