<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ab0aeb45dc.js" crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 150px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed)
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }
    </style>
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
                            <a href="#" class="nav_link active">
                                <span class="nav_name">other</span>
                            </a>
                            <a href="#" class="nav_link active">
                                <span class="nav_name">other</span>
                            </a>
                            <a href="#" class="nav_link active">
                                <span class="nav_name">other</span>
                            </a>
                            <a href="#" class="nav_link active">
                                <span class="nav_name">other</span>
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
</script>