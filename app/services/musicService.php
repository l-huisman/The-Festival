<?php

namespace Services;

use Repositories\MusicRepository;
use Models\Artist;
use Models\Song;

class MusicService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new MusicRepository();
    }

    public function getArtists()
    {
        $data = $this->repository->getArtists();
        $artists = [];
        foreach ($data as $artist) {
            $artists[] = new Artist($artist["id"], $artist['name'], $artist['description'], $artist['banner_path'], $artist['pictogram_path']);
        }
        return $artists;
    }

    public function getArtistById($id)
    {
        $data = $this->repository->getArtistById($id);
        $artist = new Artist($data["id"], $data['name'], $data['description'], $data['banner_path'], $data['pictogram_path']);
        $songs = $this->repository->getSongsByArtistId($id);
        foreach ($songs as $song) {
            $artist->addSong(new Song($song["id"], $song['name'], $song['song_path'], $song['cover_path']));
        }
        return $artist;
    }

    public function createArtist($name, $description)
    {
        $this->repository->createArtist($name, $description);
    }

    public function updateArtist($id, $name, $description)
    {
        $this->repository->updateArtist($id, $name, $description);
    }

    public function deleteArtist($id)
    {
        $this->repository->deleteArtist($id);
    }

    public function addSong($artist_id, $name, $song)
    {

        $this->repository->addSong($artist_id, $name, $song);
    }
}
