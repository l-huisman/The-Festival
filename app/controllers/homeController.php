<?php

namespace Controllers;
use Services\WysiwygService;
class HomeController
{
    private $wysiwygService;  
    public function __construct()
    {
        $this->wysiwygService = new WysiwygService();
    }
    public function index()
    { 
        $isAdmin = false;
        if (isset($_SESSION['user']) ){
            $user = unserialize($_SESSION['user']);
            if ($user->role== 'admin') {
                $isAdmin = true;
            } 
        }

        $cardID = [3,4,5];
        $contentarray = [];
        foreach ($cardID as $id) {
            $editbuttonHTML = "";
            if($isAdmin) {
                $editbuttonHTML = "<a href='custom/show?id=". $id ."' class='buttons'>Edit". $id ."</a>";
             } 
             
            $contentarray[] = $this->wysiwygService->getCustomContent($id). $editbuttonHTML;
        }
        require_once __DIR__ . '/../views/home.php';
    }
}
