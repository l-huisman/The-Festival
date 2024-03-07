<?php

namespace Models;
class Historic
{
    private $id;
    private $name;
    private $description;
    
    private $path;
    

    public function __construct($id, $name, $description, $path)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->path = $path;
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
  
}
