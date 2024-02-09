<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- fonts --}}

    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="https://unpkg.com/sweetalert@2/dist/sweetalert.css">


    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/influencer.css') }}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">
    <title>BrandBeans</title>

    <style>
        .aligned-paragraph {
            text-align: justify;
            /* text-align-last: left; */
            padding: 0 109px 0 109px;
        }
    </style>
</head>

<body class="">
    <!-- Header -->

    <header>
        <nav class="navbar navbar-expand-lg  main-header shadow-sm p-3 ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid logo" alt="Logo">
                </a>
                <a class="header-title" href="/">Home</a>
                <a class="header-title @if (Route::currentRouteName() == 'main.influencer') activeted @endif" href="{{ route('main.influencer') }}">Influencers</a>
                {{-- <a class="nav-link" href="{{ route('main.brandStory') }}">Brand Story</a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="btn btnlogin rounded-pill " href="{{ route('login') }}">Login</a>
                            <!-- <a class="btn rounded-pill px-4 btn-primary" href="{{ route('otp.login') }}">Login</a> -->
                        </li>
                        <li class="nav-item px-1">
                            <a class="btn rounded-pill  btnregister" href="{{ route('otp.login') }}">Register</a>
                        </li>
                        <!-- <li class="nav-item">
              <a class="nav-link" href="#plans">Our Plans</a>
            </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    {{-- end header --}}
    <div class="container-fluid aligned-paragraph backgroundColor text-center pt-5 mb-0">

        <h1 class="fw-bold">
            <span class="blueFont">Find the right Influencer</span>
            <span class="lightBlueFont">For your Business</span>
        </h1>

        <p class="fs-4">
            Discovering the perfect influencer for your business involves identifying individuals
            whose values align with your brand, possess a genuine connection with your target audience,
            and demonstrate an engaging online presence. Look for influencers whose content resonates
            with your brand message, ensuring a seamless integration that captivates and converts your
            desired customer base.
        </p>


        <div class="container-fluid">
            <img src="{{ asset('influencerPage/topmain.png') }}" class="topImage" alt="Top Image">
            {{-- <div class="col-md-12 col-sm-12 col-md-12">
            </div> --}}
        </div>
        <div class="pb-5">
            <button class="btn btn-info text-white">Try For Free Now</button>
        </div>

        <div class="pt-4">
            <h1 class="fw-bold"><span class="blueFont">Our Featured</span> <span class="lightBlueFont">Creator</span>
            </h1>
            <h1><i class="bi bi-dot fa-sm text-info color"></i></h1>

            <p class="fs-4">Explore our featured creators who bring unparalleled creativity and authenticity to our
                platform</p>
        </div>


        <div class="wrapper d-flex justify-content-center">
            <div class="icon mt-3"><i id="left" class="bi bi-caret-left-fill "></i></div>
            <ul class="tabs-box" name="tabValue">
                <a href="{{ route('main.influencer') }}" class="tab">All</a>
                @foreach ($category as $influencerCategory)
                    <li class="tab" value="{{ $influencerCategory->name }}">{{ $influencerCategory->name }}</li>
                @endforeach
            </ul>
            <div class="icon mt-3 ms-4"><i id="right" class="bi bi-caret-right-fill "></i></div>
        </div>


        <div class="row">
            <?php
            $count = 0;
            ?>

            @foreach ($influencers as $influencer)
                <?php
                $count++;
                ?>
                @if (isset($influencer->profilePhoto))
                    <div class="col-md-3 influencers-container pt-3" style="height: 350px">
                        <a href="{{ route('main.influencer.profile') }}/{{ $influencer->id }}">
                            <img class="image pb-2" src="{{ asset('profile') }}/{{ $influencer->profilePhoto }}" alt="image">
                        </a><br>
                        <span class="blueFont fw-bold">{{ $influencer->name }}</span>
                    </div>
                @endif
                @if ($count == 40)
                @break
            @endif
        @endforeach
    </div>
    @if (Auth::user())
        @if (Auth::user()->hasRole('Brand'))
            <a href="{{ route('brand.influencerList') }}?category=" class="btn blueButton text-white mt-3" id="viewMoreBtn">View more Influencers</a>
        @else
            <a href="{{ route('brand.register') }}" class="btn blueButton text-white mt-3">View more
                Influencers</a>
        @endif
    @else
        <a href="{{ route('login') }}" class="btn blueButton text-white mt-3">View more Influencers</a>
    @endif
    <div class="py-5">
        <h1 class="fw-bold pt-2"><span class="blueFont">How Influencer</span> <span class="lightBlueFont">Connect
                Works</span><span class="blueFont">?</span></h1>
        <p class="fs-4 ">Brands identify potential influencers whose audience aligns with their target demographic
            and reach out to establish partnerships. Through negotiations and agreements, influencers then create
            content that promotes the brand, leveraging their authentic connection with their audience to drive
            engagement and awareness.</p>

        <div class="container">
            <div class="row">
                <div class="col-md-7 d-flex justify-content-center">
                    <img src="{{ asset('influencerPage/bottom2.png') }}" class="" alt="">
                </div>
                <div class="col-md-5 pt-5">
                    <div class="card box mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="w-100 ">
                                        <div class="circleOrange ">
                                            <i class="bi bi-hand-index fs-1"></i>
                                        </div>
                                        {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="text-start">
                                        <span class="fontBrown fs-4 fw-bold">Make your Voice</span>
                                        <div class="">
                                            Empower influencers to be the authentic voice of your brand, amplifying
                                            your message with genuine influence.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="w-100 ">
                                        <div class="circleBlue ">
                                            <i class="bi bi-person-check fs-1"></i>
                                        </div>
                                        {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="text-start">
                                        <span class="fontBrown fs-4 fw-bold">Book Them Instantly</span>
                                        <div class="">
                                            Secure their influence instantly—book them now for seamless brand
                                            collaboration.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="w-100 ">
                                        <div class="circlePink ">
                                            <i class="bi bi-hand-index fs-1"></i>
                                        </div>
                                        {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="text-start">
                                        <span class="fontBrown fs-4 fw-bold">Engage Directly</span>
                                        <div class="">
                                            Connect directly and foster engagement for a more personalized and
                                            impactful interaction.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="w-100 ">
                                        <div class="circlePurple ">
                                            <i class="far fa-handshake fs-1"></i>
                                        </div>
                                        {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="text-start">
                                        <span class="fontBrown fs-4 fw-bold">Grow Your Business</span>
                                        <div class="">
                                            Expand your business and increase its success with strategic growth
                                            initiatives.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer  -->
    <hr class="hr">
    <div class="container-fluid ">
        <footer class="row p-5">
            <div class="col-md-5 my-3">
                <a href="#" class="mb-3">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid logo" alt="Logo">
                </a>


            </div>

            <style>
                ul {
                    list-style-type: none;

                }

                .nav {
                    border-bottom: none !important;
                }
            </style>

            <div class="col-md-2 my-3">
                <h5>Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('term') }}" class="nav-link p-0 text-muted">Terms</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('about') }}" class="nav-link p-0 text-muted">About</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('contact') }}" class="nav-link p-0 text-muted">Contact</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('privacy') }}" class="nav-link p-0 text-muted">Privacy</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('refund') }}" class="nav-link p-0 text-muted">Refund</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 my-3">
                <h5>Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Showcase</a></li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('otp.login') }}" class="nav-link p-0 text-muted">Login</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('otp.login') }}" class="nav-link p-0 text-muted">Register</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('term') }}" class="nav-link p-0 text-muted">Terms</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 my-3">
                <h5>Contact Us</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt text-muted" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg><label for="Address" class="ms-2 text-muted">Ahmadabad, Gujarat</label>
                    </li>
                    <li class="nav-item mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone text-muted" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg><label for="Contact-No" class="ms-2 text-muted"><a href="tel:+919876543210">+91 9979411148</a></label>
                    </li>
                    <li class="nav-item mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope text-muted" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg><label for="email" class="ms-2 text-muted">support@brandbeans.biz</label>

                    </li>
                </ul>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                    <span id="" class="mb-3 mb-md-0 text-muted">Brandbeans © <span id="year"></span> Copyright, All Rights Reserved</span>
                </div>

                <ul class="nav col-md-4 justify-content-end d-flex">
                    <li class="ms-3"><a href="https://www.facebook.com/BrandBeans-108225125477620">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a></li>
                    <li class="ms-3"><a href="https://www.instagram.com/brand_beans_/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>

                        </a></li>
                    <li class="ms-3"><a href="#">

                        </a></li>
                </ul>
            </div>
        </footer>
    </div>

    <script>
        var currentYear = new Date().getFullYear();
        var yearElement = document.getElementById('year');
        yearElement.textContent = currentYear;
    </script>




</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('scripts/influencer.js') }}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://unpkg.com/sweetalert@2"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function showRemainingInfluencers() {
        var remainingInfluencers = document.querySelectorAll('.remaining-influencers');
        remainingInfluencers.forEach(function(influencer) {
            if (influencer.style.display === 'none') {
                influencer.style.display = 'block';
            }
        });

        var showMoreButton = document.getElementById('showMoreInfluencers');
        if (showMoreButton) {
            showMoreButton.style.display = 'none';
        }

        // Perform AJAX request to cut points
        $.ajax({
            url: '/cut-points', // Replace with your API endpoint URL
            method: 'POST',
            data: {
                points: 5
            }, // Adjust the points value as needed
            success: function(response) {
                // Display Sweet Alert warning
                swal({
                    title: "Warning!",
                    text: "Your points have been deducted for viewing more influencers.",
                    icon: "warning",
                    button: "OK",
                });
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error(error);
            }
        });
    }
</script>

<script>
    // Get all tab elements
    const tabs = document.querySelectorAll('.tab');

    // Get the view more button element
    const viewMoreBtn = document.getElementById('viewMoreBtn');

    // Check if tabValue exists in localStorage
    const tabValue = localStorage.getItem('tabValue');

    // Conditionally update the href attribute of the view more button
    if (tabValue) {
        $('.tab').on('click', function(e) {
            console.log('tabValue', tabValue);
            var category = $(this).text();
            var url = '{{ route('main.influencer') }}';
            console.log('category', category);

            $.ajax({
                url: url,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    category: category
                }
            }).done(function(response) {
                console.log('response', response);
                window.location = `{{ route('main.influencer') }}?category=${encodeURIComponent(category)}`;
            });
        });
        viewMoreBtn.href = `{{ route('brand.influencerList') }}?category=${encodeURIComponent(tabValue)}`;
    } else {
        viewMoreBtn.href = `{{ route('brand.influencerList') }}`;
    }

    // Add click event listener to each tab
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Get the tab value
            const tabValue = tab.getAttribute('value');

            // Store the tab value in localStorage
            localStorage.setItem('tabValue', tabValue);

            // Update the href attribute of the view more button
            viewMoreBtn.href =
                `{{ route('brand.influencerList') }}?category=${encodeURIComponent(tabValue)}`;
        });
    });
</script>

</body>

</html>
