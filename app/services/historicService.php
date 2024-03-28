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

    public function addHistoricEvent($name, $description, $path, $location)
    {
        $path = $this->formatImagePath($path);
        return $this->repository->addHistoricEvent($name, $description, $path, $location);
    }
    
    public function UpdateHistoricEvent($id, $name, $description, $path, $location)
    {
        $path = $this->formatImagePath($path);
        return $this->repository->updateHistoricEvent($id, $name, $description, $path, $location);
    }

    public function formatImagePath($path) {
        // Find the last occurrence of a backslash or forward slash
        $lastSlashPosition = max(strrpos($path, '/'), strrpos($path, '\\'));
    
        if ($lastSlashPosition !== false) {
            // Extract the filename part after the last slash
            $filenamePart = substr($path, $lastSlashPosition + 1);
    
            // Check if the filename part contains an underscore
            if (str_contains($filenamePart, '_')) {
                // If it contains an underscore, extract the part after it
                $filename = substr($filenamePart, strpos($filenamePart, "_") + 1);
            } else {
                // Otherwise, use the whole filename part
                $filename = $filenamePart;
            }
    
            // Reconstruct the path with the desired format
            $path = "/img/historicevents/{$filename}";
        } else {
            // If no slash is found, just return the original path
            $path = "/img/historicevents/{$path}";
        }
    
        return $path;
    }
    









}
