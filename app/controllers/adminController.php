<?php

namespace Controllers;

use Services\AdminService;
use Services\MusicService;
use Services\VenueService;

class AdminController
{
    private $adminService;
    private $musicService;
    private $venueService;

    public function __construct()
    {
        $this->adminService = new AdminService();
        $this->musicService = new MusicService();
        $this->venueService = new VenueService();

        $url = explode('/', $_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];

        // You can do this without being admin user
        if ($url[2] === 'loginPage' || $url[2] === 'login' && $method == 'POST') {
            return;
        }
        $this->is_admin();
    }

    public function is_admin()
    {
        if (!isset($_SESSION['user']) || unserialize($_SESSION['user'])->role != "admin") {
            header('Location:/');
            die();
        }
    }

    public function login()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $this->adminService->verifyAdminLogin($email, $password);
    }

    public function overviewUsers()
    {
        $users = $this->adminService->getAllUsers();
        require_once __DIR__ . '/../views/user/overviewUsers.php';
    }

    public function music($id)
    {
        switch ($id) {
            case 1:
                $artists = $this->musicService->getArtists();
                require_once __DIR__ . '/../views/admin/artist.php';
                break;
            case 2:
                $events = $this->musicService->getEvents();
                $venues = $this->venueService->getVenues();
                $artists = $this->musicService->getArtists();
                require_once __DIR__ . '/../views/admin/event.php';
                break;
            case 3:
                $venues = $this->venueService->getVenues();
                require_once __DIR__ . '/../views/admin/venue.php';
                break;
            default:
                header('Location:/');
                die;
        }
    }

    public function deleteUser()
    {
        $user_id = htmlspecialchars($_GET['user_id']);
        $this->adminService->deleteUser($user_id);
        header('Location:/admin/overviewUsers');
    }

    public function editUserView()
    {
        $user_id = htmlspecialchars($_GET['user_id']);
        $user = $this->adminService->getUserById($user_id);
        require_once __DIR__ . '/../views/user/editUser.php';
    }

    public function validateUserAccount()
    {

        $newFirstName = htmlspecialchars($_POST['newFirstName']);
        $newLastName = htmlspecialchars($_POST['newLastName']);
        $newDateOfBirth = htmlspecialchars($_POST['newDateOfBirth']);
        $newAddress = htmlspecialchars($_POST['newAddress']);
        $newPhoneNumber = htmlspecialchars($_POST['newPhoneNumber']);
        $newRole = htmlspecialchars($_POST['newRole']);
        $user_id = htmlspecialchars($_POST['user_id']);
        $this->adminService->validateUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id);
        header('Location:/admin/overviewUsers');
    }

    public function createArtist()
    {
        try {
            // Get the data from the form
            $artist_name = htmlspecialchars($_POST['name']);
            $artist_description = htmlspecialchars($_POST['description']);
            $artist_banner = "/img/artists/" . $this->transformName($artist_name) . "/banner.jpg";
            $artist_pictogram = "/img/artists/" . $this->transformName($artist_name) . "/pictogram.jpg";
            $this->musicService->createArtist($artist_name, $artist_description, $artist_banner, $artist_pictogram);
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=1');
    }

    public function updateArtist()
    {
        try {
            // Get the data from the form
            $artist_id = htmlspecialchars($_POST['id']);
            $artist_name = htmlspecialchars($_POST['name']);
            $artist_description = htmlspecialchars($_POST['description']);
            $artist_banner = "/img/artists/" . $this->transformName($artist_name) . "/banner.jpg";
            $artist_pictogram = "/img/artists/" . $this->transformName($artist_name) . "/pictogram.jpg";

            // Get the files from the form
            if (isset($_FILES['pictogram'])) {
                echo "pictogram set";
                $artist_pictogram_file = $_FILES['pictogram'];
            }
            if (isset($_FILES['banner'])) {
                echo "banner set";
                $artist_banner_file = $_FILES['banner'];
            }

            // Get the current data of the artist
            $artist = $this->musicService->getArtistById($artist_id);

            // If the artist name has changed, update the artist's folder name
            if ($artist->getBanner() != null && $artist->getPictogram() && $this->transformName($artist->getName()) != $this->transformName($artist_name)) {
                $old_folder = __DIR__ . "/../public/img/artists/" . $this->transformName($artist->getName());
                $new_folder = __DIR__ . "/../public/img/artists/" . $this->transformName($artist_name);
                rename($old_folder, $new_folder);
            }

            // Update the artist's data
            $this->musicService->updateArtist($artist_id, $artist_name, $artist_description, $artist_banner, $artist_pictogram);
            if (isset($_FILES['pictogram'])) {
                $this->saveImage($artist_pictogram_file, __DIR__ . "/../public" . $artist_pictogram);
            }
            if (isset($_FILES['banner'])) {
                $this->saveImage($artist_banner_file, __DIR__ . "/../public" . $artist_banner);
            }
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=1');
    }

    public function deleteArtist()
    {
        try {
            $artist_id = htmlspecialchars($_POST['id']);
            $this->musicService->deleteArtist($artist_id);
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=1');
    }

    public function saveImage($file, $target_file)
    {
        try {
            move_uploaded_file($file["tmp_name"], $target_file);
        } catch (\Exception $e) {
        }
    }

    public function transformName($name)
    {
        return str_replace(' ', '', strtolower($name));
    }

    public function createVenue()
    {
        try {
            $venue_name = htmlspecialchars($_POST['name']);
            $venue_location = htmlspecialchars($_POST['address']);
            $this->venueService->createVenue($venue_name, $venue_location);
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=3');
    }

    public function updateVenue()
    {
        try {
            $venue_id = htmlspecialchars($_POST['id']);
            $venue_name = htmlspecialchars($_POST['name']);
            $venue_location = htmlspecialchars($_POST['address']);
            $this->venueService->updateVenue($venue_id, $venue_name, $venue_location);
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=3');
    }

    public function deleteVenue()
    {
        try {
            $venue_id = htmlspecialchars($_POST['id']);
            $this->venueService->deleteVenue($venue_id);
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=3');
    }

    public function createEvent()
    {
        try {
            $available_tickets = htmlspecialchars($_POST['availableTickets']);
            $event_date = htmlspecialchars($_POST['eventDateTime']);
            $duration = htmlspecialchars($_POST['duration']);
            $price = htmlspecialchars($_POST['price']);
            $artist_ids = $_POST['artistId'];
            $venue_id = htmlspecialchars($_POST['venueId']);
            $this->musicService->createEvent($available_tickets, $event_date, $duration, $price, $artist_ids, $venue_id);
        } catch (\Exception $e) {
        }
        header('Location:/admin/music?id=2');
    }

    public function updateEvent()
    {
        try{
            $id = htmlspecialchars($_POST['id']);
            $available_tickets = htmlspecialchars($_POST['availableTickets']);
            $event_date = htmlspecialchars($_POST['eventDate']);
            $duration = htmlspecialchars($_POST['duration']);
            $price = htmlspecialchars($_POST['price']);
            $artist_ids = $_POST['artistId'];
            $venue_id = htmlspecialchars($_POST['venueId']);
            $this->musicService->updateEvent($id, $available_tickets, $event_date, $duration, $price, $artist_ids, $venue_id);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        header('Location:/admin/music?id=2');
    }

    public function overviewOrders(){
        $orders = $this->adminService->getAllOrders();
        require_once __DIR__ . '/../views/admin/overviewOrders.php';
    }

    public function loginPage(){
        require __DIR__ . '/../views/admin/loginPage.php';
    }

}
