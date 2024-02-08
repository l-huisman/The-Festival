<?php

namespace Services;

use Endroid\QrCode\QrCode;

class Qr
{
    public function generate(string $text)
    {
        $qrCode = new QrCode($text);
    }
}
