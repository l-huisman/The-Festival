<?php

namespace Repositories;

class WysiwygRepository extends Repository
{
    public function getCustomPage($id)
    {
        $sql = "SELECT id, name, content FROM wysiwyg WHERE id = $id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch();
        return $stmt;
    }

    public function getAllCustomPages()
    {
        $stmt = $this->connection->prepare("SELECT id, name, content FROM wysiwyg");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function createCustomPage($name, $content)
    {
        $sql = "INSERT INTO wysiwyg (name, content) VALUES (:name, :content)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        $id = $this->connection->lastInsertId();
        return $id;
    }

    public function updateCustomPage($name, $content, $id)
    {
        $sql = "UPDATE wysiwyg SET name = :name, content = :content WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteCustomPage($id)
    {
        $sql = "DELETE FROM wysiwyg WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
