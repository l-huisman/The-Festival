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
                // TODO: Implement getEvents() method in MusicService
                // $table_data = $this->musicService->getEvents();
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

    public function loginPage()
    {
        require __DIR__ . '/../views/admin/loginPage.php';
    }
}
