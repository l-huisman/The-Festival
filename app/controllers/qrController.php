<?php

namespace Controllers;

class QrController
{
    public function index()
    {
        require_once __DIR__ . '/../views/qr/reader.php';
    }
}
