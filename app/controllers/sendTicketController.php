<?php

namespace Controllers;

use Services\SendTicketService;
use Services\QRCodeGenerator;

class SendTicketController
{
    private $sendTicketService;
    private $qrCodeGenerator;

    public function __construct()
    {
        $this->sendTicketService = new SendTicketService();
        $this->qrCodeGenerator = new QRCodeGenerator();
    }

    public function index()
    {
        //$ticket = $this->sendTicketService->getTickets(); 
        //$this->qrCodeGenerator->generate("testId");
        //$qrCode = $this->qrCodeGenerator->getQrCode();
    }
}