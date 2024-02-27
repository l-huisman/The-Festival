<?php

namespace Models;

class Song{

    public $id;
    public $name;
    public $song;
    public $cover;

    public function __construct($id, $name, $song, $cover)
    {
        $this->id = $id;
        $this->name = $name;
        $this->song = $song;
        $this->cover = $cover;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
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