<?php

namespace Models;

class Artist
{
    public $id;
    public $name;
    public $songs;

    public function __construct($id, $name, $songs)
    {
        $this->id = $id;
        $this->name = $name;
        $this->songs = $songs;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSongs()
    {
        return $this->songs;
    }
}