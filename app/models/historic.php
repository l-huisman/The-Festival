<?php

namespace Models;
class Historic
{
    private $id;
    private $name;
    private $description;
    
    private $path;

    private $location;
    

    public function __construct($id, $name, $description, $path, $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->path = $path;
        $this->location = $location;
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

   

    public function getPath()
    {
        return $this->path;
    }

    public function getLocation()
    {
        return $this->location;
    }
  
}
