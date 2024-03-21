<?php

namespace Controllers;

class AdminController
{
    private $adminService;
    public function __construct()
    {
        $this->adminService = new \Services\AdminService();

        $url = explode('/', $_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];

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

    public function music()
    {
        // $music = $this->adminService->getAllMusic();
        // require_once __DIR__ . '/../views/music/music.php';
    }


    public function deleteUser()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user->role == 'admin') {
                $user_id = htmlspecialchars($_GET['user_id']);
                $this->adminService->deleteUser($user_id);
                header('Location:/admin/overviewUsers');
            } else {
                header('Location:/');
                die();
            }
        } else {
            header('Location:/');
            die();
        }
    }

    public function editUserView()
    {
        $user_id = htmlspecialchars($_GET['user_id']);
        $user = $this->adminService->getUserById($user_id);
        require_once __DIR__ . '/../views/user/editUser.php';
    }

    public function validateUserAccount()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user->role == 'admin') {
                $newFirstName = htmlspecialchars($_POST['newFirstName']);
                $newLastName = htmlspecialchars($_POST['newLastName']);
                $newDateOfBirth = htmlspecialchars($_POST['newDateOfBirth']);
                $newAddress = htmlspecialchars($_POST['newAddress']);
                $newPhoneNumber = htmlspecialchars($_POST['newPhoneNumber']);
                $newRole = htmlspecialchars($_POST['newRole']);
                $user_id = htmlspecialchars($_POST['user_id']);
                $this->adminService->validateUserAccount($newFirstName, $newLastName, $newDateOfBirth, $newAddress, $newPhoneNumber, $newRole, $user_id);

                header('Location:/admin/overviewUsers');
            } else {
                header('Location:/');
                die();
            }
        } else {
            header('Location:/');
            die();
        }
    }

    public function loginPage()
    {
        require __DIR__ . '/../views/admin/loginPage.php';
    }
}
