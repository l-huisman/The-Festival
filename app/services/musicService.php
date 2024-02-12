<?php

namespace Services;

use Repositories\MusicRepository;
use Models\Artist;

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
            $artists[] = new Artist($artist["id"], $artist['name'], $artist['description'], $artist['songs']);
        }
        return $artists;
    }

    public function getArtistById($id)
    {
        $data = $this->repository->getArtistById($id);
        return new Artist($data["id"], $data['name'], $data['description']);
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
