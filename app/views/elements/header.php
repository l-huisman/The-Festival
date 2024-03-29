<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 

<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ab0aeb45dc.js" crossorigin="anonymous"></script>
    <?php if(isset($_SESSION['user'])) { 
        $user = unserialize($_SESSION['user']);
        if($user->role == 'admin') { 
            $url = explode('/', $_SERVER['REQUEST_URI']);
            if(isset($url[2])){ ?>
                <link type="text/css" rel="stylesheet" href="../styles/adminHeader.css">

            <?php } else { ?>
                <link type="text/css" rel="stylesheet" href="./styles/adminHeader.css">
            <?php } ?>

    <?php }
    } ?>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom" style="background-color: #ffffff !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">H</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/yummy">Yummy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/music">Music</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/historic">History</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/contact">Info</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/contact">Info</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php 

                        if (isset($_SESSION['user'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/register/logout">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/register/loginview">Login</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/shoppingcart">Shopping cart</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="/admin/loginPage">Admin</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="/user/manageAccount"><i class="fa-regular fa-user"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <!-- create a sidebar -->
    <!-- check if admin user is logged in -->
    <?php if (isset($_SESSION['user'])) {
        $user = unserialize($_SESSION['user']);
        if ($user->role == 'admin') { ?>
            <div class="l-navbar" id="nav-bar">
                <nav class="nav">
                    <div>
                        <a href="/home" class="nav_logo">
                            <i class='bx bx-layer nav_logo-icon'></i>
                            <span class="nav_logo-name">Home</span>
                        </a>
                        <div class="nav_list">
                            <a href="/admin/overviewUsers" class="nav_link active">
                                <span class="nav_name">Users</span>
                            </a>
                            <div onclick=toggleDropdown() class="nav_link active" style="cursor:pointer">
                                <span class="nav_name">Music</span>
                            </div>
                            <div class="container" id="dropdown-music">
                                <a href="/admin/music?id=1" class="nav_link active">
                                    <span class="nav_name">Artist</span>
                                </a>
                                <a href="/admin/music?id=2" class="nav_link active">
                                    <span class="nav_name">Event</span>
                                </a>
                                <a href="/admin/music?id=3" class="nav_link active">
                                    <span class="nav_name">Venue</span>
                                </a>
                            </div>
                            <div onclick=toggleYummyDropdown() class="nav_link active" style="cursor:pointer">
                                <span class="nav_name">Yummy</span>
                            </div>
                            <div class="container" id="dropdown-yummy">
                                <a href="/yummy/restaurantOverview" class="nav_link active">
                                    <span class="nav_name">Restaurant</span>
                                </a>
                                <a href="/yummy/sessionOverview" class="nav_link active">
                                    <span class="nav_name">Session</span>
                                </a>
                            </div>
                            <div onclick=toggleDropdownHistory() class="nav_link active" style="cursor:pointer">
                                <span class="nav_name">History</span>
                            </div>
                            <div class="container" id="dropdown-history">
                                <a href="/historic/historyOverview" class="nav_link active">
                                    <span class="nav_name">HistoryEvent</span>
                                </a>
                                <a href="/historic/tourOverview" class="nav_link active">
                                    <span class="nav_name">Tour</span>
                                </a>
                            </div>
                            <a href="/custom" class="nav_link active">
                                <span class="nav_name">Custom</span>
                            </a>
                            <a href="/admin/overviewOrders" class="nav_link active">
                                <span class="nav_name">Orders</span>
                            </a>
                        </div>
                    </div>
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> -->
                </nav>
            </div>

    <?php }
    } ?>
</body>

<script>
    var dropdown = document.getElementById('dropdown-music');
    dropdown.style.display = 'none';

    function toggleDropdown() {
        if (dropdown.style.display === 'none') {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    }

    var yummyDropdown = document.getElementById('dropdown-yummy');
    yummyDropdown.style.display = 'none';

    function toggleYummyDropdown() {
        if (yummyDropdown.style.display === 'none') {
            yummyDropdown.style.display = 'block';
        } else {
            yummyDropdown.style.display = 'none';
        }
    }

    var historyDropdown = document.getElementById('dropdown-history');
    historyDropdown.style.display = 'none';

    function toggleDropdownHistory() {
        if (historyDropdown.style.display === 'none') {
            historyDropdown.style.display = 'block';
        } else {
            historyDropdown.style.display = 'none';
        }
    }


</script>

</html>