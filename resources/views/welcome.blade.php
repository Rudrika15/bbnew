<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Hello, world!</title>
    <style>
        .banner {
            background-image: url(https://brandbeans.biz/asset/img/hahaha.jpg);
            background-position: top;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .height {
            min-height: 16rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow p-1 mb-2 bg-body rounded">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    {{-- Poster --}}
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-8 header-text m-5">
                    <h1 class="mt-5 display-3">
                        CREATE YOUR<br>
                        <b>
                            DIGITAL BUSINESS <br> CARD
                        </b>
                    </h1>
                    <div class="play my-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-play-circle-fill " viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z">
                            </path>
                        </svg>
                        <a href="https://brandbeans.biz/loginn"
                            class="btn btn-primary mx-5 py-3 px-5 button text-white">Create Your
                            Card</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <div class="container">
        <div class="row py-3">
            <h2 class="text-center">How its's work?</h2>
            <div class="col-md-4 ">
                <div class="card height">
                    <div class="card-body">
                        <h2 class="display-4">
                            <i class="bi bi-person-add size"></i>
                        </h2>
                        <h4>Register</h4>
                        Register yourself to create your Virtual Business Card with Us
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card height">
                    <div class="card-body">
                        <h2 class="display-4"><i class="bi bi-file-earmark-arrow-up-fill size"></i></h2>
                        <h4>Update Profile </h4>
                        Our Login Panel is accessible anytime from anywhere.
                    </div>
                </div>
            </div>
            <div class="col-md-4 hover-shadow">
                <div class="card height">
                    <div class="card-body">
                        <h2 class="display-4"><i class="bi bi-share-fill size"></i></h2>
                        <h4>Share</h4>
                        You can share your Digital Business Card from anywhere & anytime.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
