<?php

namespace Models;
class Historic
{
    private $id;
    private $description;
    private $name;
    private $eventDate;
    private $location;
    private $language;

    public function __construct($id, $description, $name, $eventDate, $location, $language)
    {
        $this->id = $id;
        $this->description = $description;
        $this->name = $name;
        $this->eventDate = $eventDate;
        $this->location = $location;
        $this->language = $language;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

   

    public function getName()
    {
        return $this->name;
    }

   

    public function getEventDate()
    {
        return $this->eventDate;
    }

  

    public function getLocation()
    {
        return $this->location;
    }

 

    public function getLanguage()
    {
        return $this->language;
    }

    public function __toString()
    {
        return "<div class=container>Historic event: $this->name" . " Description: $this->description" . " Location: $this->location" . " Language: $this->language</div>";
    }
   
}
