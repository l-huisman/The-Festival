<?php

namespace Models;

class Guide
{

    private $guide_id;
    private $tour_id;
    private $name;
    private $language;

    public function __construct($guide_id, $tour_id, $name, $language)
    {
        $this->guide_id = $guide_id;
        $this->tour_id = $tour_id;
        $this->name = $name;
        $this->language = $language;
    }

    public function getGuideId()
    {
        return $this->guide_id;
    }

    public function getTourId()
    {
        return $this->tour_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLanguage()
    {
        return $this->language;
    }
    
}
