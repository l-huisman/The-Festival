<?php

namespace Controllers;

class YummyController{
    public function yummyOverview()
    {
        require __DIR__ . '/../views/yummy/yummyOverview/yummyOverview.php';
    }
    public function yummyDetail()
    {
        require __DIR__ . '/../views/yummy/yummyDetail/yummyDetail.php';
    }
}