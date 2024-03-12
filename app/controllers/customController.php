<?php

namespace Controllers;

use Services\WysiwygService;

class CustomController
{
    private $wysiwygService;

    public function __construct()
    {
        $this->wysiwygService = new WysiwygService();
    }

    public function show($id)
    {
        $customPage = $this->wysiwygService->getCustomPage($id);
        require_once __DIR__ . '/../views/custom/index.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $content = $_POST['editor'];
        $this->wysiwygService->updateCustomPage('Custom Page', $content, $id);
        header('Location: /custom/show?id=' . $id);
    }
}
