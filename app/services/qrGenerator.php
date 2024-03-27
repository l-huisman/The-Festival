<?php

namespace Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeGenerator
{
    private $qr_code;

    public function generate(string $text)
    {
        $this->qr_code = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($text)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->logoPath(__DIR__ . '/assets/symfony.png') //TODO: replace with your logo
            ->logoResizeToWidth(50)
            ->logoPunchoutBackground(true)
            ->labelText('This is the label') //TODO: replace with your label
            ->labelFont(new NotoSans(20))
            ->labelAlignment(LabelAlignment::Center)
            ->validateResult(false)
            ->build();
    }

    public function display()
    {
        header('Content-Type: ' . $this->qr_code->getMimeType());
        echo $this->qr_code->writeString();
    }

    public function save(string $path)
    {
        $this->qr_code->saveToFile(__DIR__ . '/assets/' . $path);
    }

    public function getQrCode()
    {
        return $this->qr_code;
    }
}
