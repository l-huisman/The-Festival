<?php

namespace Services;

use Repositories\HistoricRepository;
use Models\Historic;

class HistoricService
{



    public function getAllHistoricEvents()
    {
        $repository = new HistoricRepository();
        $historic = $repository->getAllHistoricEvents();
        return $historic;
    }

    public function getHistoricEventById($id)
    {
        $data = $this->repository->getHistoricEventById($id);
        return new Historic($data["id"], $data['description'], $data['name'], $data['eventDate'], $data['location'], $data['language']);
    }

    public function createHistoricEvent($name, $description, $eventDate, $location, $language)
    {
        $this->repository->createHistoricEvent($name, $description, $eventDate, $location, $language);
    }

    public function updateHistoricEvent($id, $name, $description, $eventDate, $location, $language)
    {
        $this->repository->updateHistoricEvent($id, $name, $description, $eventDate, $location, $language);
    }

    public function deleteHistoricEvent($id)
    {
        $this->repository->deleteHistoricEvent($id);
    }




}
