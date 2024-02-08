<?php

namespace Controllers;

class Controller
{
    public function index(string $index_page = 'app/views/home.php')
    {
        require_once "app/views/elements/header.php";

        require_once $index_page;
        
        require_once "app/views/elements/footer.php";
    }
}
