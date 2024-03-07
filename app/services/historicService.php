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
        $repository = new HistoricRepository();
        $historic = $repository->getAllHistoricEvents();
        return $historic;
    }

    public function getHistoricEventById($id)
    {
        $data = $this->repository->getHistoricEventById($id);
        $event = new Historic($data["historicevent_id"], $data['name'], $data['description'], $data['path']);
        return $event;
    }

    

   
 




}
