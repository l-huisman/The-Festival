<?php

namespace Models;

class Artist
{
    private $id;
    private $name;
    private $description;
    private $banner;
    private $pictogram;

    public function __construct($id, $name, $description, $banner = '/img/artists/hardwell/banner.png', $pictogram = '/img/artists/hardwell/pictogram.jpg')
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->banner = $banner;
        $this->pictogram = $pictogram;
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
}
