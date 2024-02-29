<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ab0aeb45dc.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom" style="background-color: #ffffff !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">H</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="\yummy\yummyOverview">Yummy</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">Music</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">History</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">CRUD</a>
                </li>
                <?php 

                if(isset($_SESSION['user'])) { ?>
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
                    <a class="nav-link" href="/user/manageAccount"><i class="fa-regular fa-user"></i></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    </div>
</body>