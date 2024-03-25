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

    public function index()
    {
        $allCustomPages = $this->wysiwygService->getAllCustomPages();
        require_once __DIR__ . '/../views/custom/index.php';
    }

    public function show($id)
    {
        $customPage = $this->wysiwygService->getCustomPage($id);
     
      
        require_once __DIR__ . '/../views/custom/editcustompage.php';
    }

    public function create()
    {
        $name = htmlspecialchars($_POST['name']);
       
        $this->wysiwygService->createCustomPage($name, '<div class="container d-flex flex-column align-items-center"><h1>Welcome to this custom made page!</h1><h2>You can edit the content of this page by using the wysiwyg editor below.</h2><p>That is if you are logged in as an administrator!</p></div>');
        header('Location: /custom/index');
    }

    public function update()
    {
        $id = $_POST['id'];
        $content = $_POST['editor'];
        $this->wysiwygService->updateCustomPage('Custom Page', $content, $id);
        header('Location: /custom/show?id=' . $id);
    }

    public function delete($id)
    {
        
        $this->wysiwygService->deleteCustomPage($id);
        header('Location: /custom/index');
    }
}
