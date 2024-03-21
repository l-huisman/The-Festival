<?php

namespace Services;

use Repositories\HistoricRepository;
use Models\Historic;

class HistoricService
{

    public $repository;

    public function __construct()
    {
        $this->repository = new HistoricRepository();
    }
    public function getAllHistoricEvents()
    {

        $data = $this->repository->getAllHistoricEvents();
        $allEventsHistoric = [];
        foreach ($data as $h) {
            $allEventsHistoric[] = new Historic($h["historicevent_id"], $h['name'], $h['description'], $h['path'], $h['location']);
           
        }
        return $allEventsHistoric;
    }

    public function getHistoricEventById($id)
    {
        $data = $this->repository->getHistoricEventById($id);
        $event = new Historic($data["historicevent_id"], $data['name'], $data['description'], $data['path'], $data['location']);
        return $event;
    }

    public function deleteHistoricEvent($id)
    {
       return $this->repository->deleteHistoricEvent($id);
    }

    public function UpdateHistoricEvent($id, $name, $description, $path, $location)
    {
        return $this->repository->updateHistoricEvent($id, $name, $description, $path, $location);
    }









}
