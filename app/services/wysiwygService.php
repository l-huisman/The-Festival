<?php

namespace Services;

use Repositories\WysiwygRepository;
use Models\CustomPage;

class WysiwygService
{
    private $wysiwygRepository;

    public function __construct()
    {
        $this->wysiwygRepository = new WysiwygRepository();
    }

    public function getCustomPage($id)
    {
        $data = $this->wysiwygRepository->getCustomPage($id);
        if ($data) {
            return new CustomPage($data['id'], $data['name'], $data['content']);
        }
        return $this->createCustomPage('Custom Page', '<div class="container d-flex flex-column align-items-center"><h1>Welcome to this custom made page!</h1><h2>You can edit the content of this page by using the wysiwyg editor below.</h2><p>That is if you are logged in as an administrator!</p></div>');
    }

    public function createCustomPage($name, $content)
    {
        $id = $this->wysiwygRepository->createCustomPage($name, $content);
        // A custom page was created on id $data so we can return it
        if ($id) {
            header('Location: /custom/show?id=' . $id);
        }
        return null;
    }

    public function updateCustomPage($name, $content, $id)
    {
        // First check if the page exists in the database before updating
        $page = $this->wysiwygRepository->getCustomPage($id);
        if (!$page) {
            return $this->createCustomPage($name, $content);
        }

        return $this->wysiwygRepository->updateCustomPage($name, $content, $id);
    }

    public function deleteCustomPage($id)
    {
        return $this->wysiwygRepository->deleteCustomPage($id);
    }
}
