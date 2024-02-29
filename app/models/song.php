<?php

namespace Models;

class Song{

    public $id;
    public $song;
    public $cover;

    public function __construct($id, $song, $cover)
    {
        $this->id = $id;
        $this->song = $song;
        $this->cover = $cover;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSong()
    {
        return $this->song;
    }

    public function getCover()
    {
        return $this->cover;
    }
}