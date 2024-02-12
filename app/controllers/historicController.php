<?php

namespace Controllers;

class HistoricController{
    public function index()
    {
        require __DIR__ . '/../views/historic/historicOverview.php';
    }
    public function historicDetail()
    {
        require __DIR__ . '/../views/historic/historicDetail.php';
    }
}