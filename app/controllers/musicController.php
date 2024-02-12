<?php

namespace Controllers;

class MusicController
{
    public function index()
    {
        require_once __DIR__ . '/../views/music/music.php';
    }

    public function artist($artist)
    {
        require_once __DIR__ . '/../views/music/artist.php';
    }
}
