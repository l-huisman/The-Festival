<?php

namespace Services;

use Repositories\VenueRepository;
use Models\Venue;

class VenueService
{
    private $venueRepository;

    public function __construct()
    {
        $this->venueRepository = new VenueRepository();
    }

    public function getVenues()
    {
        $venues = $this->venueRepository->getVenues();
        $venueArray = [];
        foreach ($venues as $venue) {
            $venueArray[] = new Venue($venue['id'], $venue['name'], $venue['address']);
        }
        return $venueArray;
    }

    public function getVenueById($id)
    {
        $venue = $this->venueRepository->getVenueById($id);
        return new Venue($venue['id'], $venue['name'], $venue['address']);
    }

    public function createVenue($name, $address)
    {
        $this->venueRepository->createVenue($name, $address);
    }

    public function updateVenue($id, $name, $address)
    {
        $this->venueRepository->updateVenue($id, $name, $address);
    }

    public function deleteVenue($id)
    {
        $this->venueRepository->deleteVenue($id);
    }
}
