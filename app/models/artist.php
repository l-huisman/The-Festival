<?php

namespace Models;

class Artist
{
    private $id;
    private $name;
    private $description;
    private $banner;
    private $pictogram;
    private $songs;

    public function __construct($id, $name, $description = "", $banner = "", $pictogram = "", $songs = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->banner = $banner;
        $this->pictogram = $pictogram;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getBanner()
    {
        return $this->banner;
    }

    public function getPictogram()
    {
        return $this->pictogram;
    }

    public function getSongs()
    {
        return $this->songs;
    }

    public function addSong($song)
    {
        $this->songs[] = $song;
    }

    # to string
    public function __toString()
    {
        return "<div class=container>Artist: $this->name" . " Description: $this->description" . " Banner: $this->banner" . " Pictogram: $this->pictogram</div>";
    }
}
