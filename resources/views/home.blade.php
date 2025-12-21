<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 29 - Recruitment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --saffron-yellow: #FFB300;
            --navy-blue: #001F3F;
            --logout-btn: #fff;
        }

        body {
            font-family: "Inter", sans-serif;
        }

        .navbar {
            background-color: var(--navy-blue) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--saffron-yellow) !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-link {
            color: white !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--saffron-yellow) !important;
        }

        .btn-primary {
            background-color: var(--saffron-yellow);
            border-color: var(--saffron-yellow);
            color: var(--navy-blue);
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #FFA000;
            border-color: #ffa20081;
            color: var(--navy-blue);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--navy-blue) 0%, #003366 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            font-family: "Inter", sans-serif;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/asset/img/logo.jpeg') no-repeat bottom;
            background-size: cover;
            /* optional, to cover the whole section */
            opacity: 0.5;
            z-index: -1;
            /* make sure it's behind the content */
        }


        .hero-content {
            position: relative;
            z-index: 1;
        }

        .feature-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--saffron-yellow), #FFA000);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--navy-blue);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--saffron-yellow), #FFA000);
            padding: 80px 0;
        }

        .footer {
            background-color: var(--navy-blue);
            color: white;
            padding: 40px 0 20px;
        }

        .footer a {
            color: var(--saffron-yellow);
            text-decoration: none;
        }

        .footer a:hover {
            color: #FFA000;
        }

        .section-title {
            color: var(--navy-blue);
            font-weight: bold;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--saffron-yellow);
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-4">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="bi bi-flag-fill"></i> PROJECT 29
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cta">Join Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary ms-2 px-3" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link btn btn-outline-danger ms-2 px-3">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary ms-2 px-3" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="home" class="py-5 hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 mt-5">
                    <h1 class=" display-3 fw-bold mb-4 text-justify align-middle">Not Too Young To Lead-Project29</h1>
                    <p class="lead">Not Too Young To Lead Movement Recruitment Initiative - Lofa County Electoral
                        District #5, Liberia</p>
                    <p class="lead">
                        Join TEAM KWABO and be part of the Not Too Young To Lead Movement,
                        empowering youth leadership and civic participation ahead of the
                        2029 elections in Lofa County.
                    </p>
                    <p class="lead mb-4">Building Tomorrow & shaping the future Together. Your voice
                        matters, your participation counts.</p>
                    <a href="#cta" class="btn btn-primary btn-lg me-3 mb-2 pl-3">
                        <i class="bi bi-person-plus-fill"></i> Join Now
                    </a>
                    <a href="#about" class="btn btn-outline-light btn-lg px-3">
                        <i class="bi bi-info-circle"></i> Learn More
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/project29.jpeg') }}" alt="Project 29"
                        class="img-fluid rounded shadow-md mt-2" height="80" style="height: 500px; width: 600px;">
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-5 mt-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">About Project 29</h2>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <h3 class="mb-4">Our Mission</h3>
                    <p>Project 29 is a groundbreaking recruitment and mobilization initiative designed to bring together
                        passionate individuals committed to creating positive change in our communities.</p>
                    <p>We believe in the power of organized grassroots movements and the importance of civic engagement
                        for building a stronger, more inclusive future.</p>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">Our Vision</h3>
                    <p>By 2029, we aim to have built a comprehensive network of engaged citizens who are ready to
                        participate actively in democratic processes and community development.</p>
                    <p>Through strategic recruitment, training, and mobilization, we're creating a foundation for
                        sustainable political and social engagement.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Key Features</h2>
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4>Community Building</h4>
                            <p>Connect with like-minded individuals across districts, clans, and towns to build a strong
                                network.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h4>Data-Driven Insights</h4>
                            <p>Advanced analytics and reporting to track growth, engagement, and demographic trends.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4>Secure Platform</h4>
                            <p>Your data is protected with industry-standard security measures and role-based access
                                control.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <h4>Mobile Friendly</h4>
                            <p>Access the platform from any device - desktop, tablet, or mobile phone.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <h4>Real-time Updates</h4>
                            <p>Receive instant notifications about your membership status and important announcements.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </div>
                            <h4>Volunteer Opportunities</h4>
                            <p>Find meaningful ways to contribute your skills and time to the movement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-5 bg-light">
        <div class="container">
             <h2 class="text-center section-title">Members Stats</h2>
            <div class="row text-center g-4">

                {{-- Total Members --}}
                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-people-fill fs-1 text-success"></i>
                            </div>
                            <h4>Total Members</h4>
                            <h2 class="fw-bold mt-3">{{ number_format($totalMembers) }}</h2>
                            <p class="text-muted mb-0">Registered Members</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-gender-male text-primary"></i>
                            </div>
                            <h4>Total Male</h4>
                            <h2 class="fw-bold mt-3">{{ number_format($totalMale) }}</h2>
                            <p class="text-muted mb-0">Registered</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card feature-card">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-gender-female text-danger"></i>
                            </div>
                            <h4>Total Female</h4>
                            <h2 class="fw-bold mt-3">{{ number_format($totalFemale) }}</h2>
                            <p class="text-muted mb-0">Registered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section id="cta" class="cta-section text-center">
        <div class="container">
            <h2 class="display-4 fw-bold section-title mb-4">Ready to Make a Difference?</h2>
            <p class="lead text-black mb-5">Join thousands of members already part of Project 29.Your voice, your
                participation, and your leadership matter. Together,
                we're
                building a better tomorrow. !</p>
            @auth
                <a href="{{ route('members.create') }}" class="btn btn-light btn-lg px-5">
                    <i class="bi bi-person-plus-fill"></i> Register as Member
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5">
                    <i class="bi bi-person-plus-fill"></i> Get Started Today
                </a>
            @endauth
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Contact Us</h2>
            <div class="row mt-5">
                <div class="col-lg-4 text-center mb-4">
                    <i class="bi bi-geo-alt-fill" style="font-size: 3rem; color: var(--saffron-yellow);"></i>
                    <h5 class="mt-3">Address</h5>
                    <p>123 Project Street<br>Kigali, Rwanda</p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <i class="bi bi-envelope-fill" style="font-size: 3rem; color: var(--saffron-yellow);"></i>
                    <h5 class="mt-3">Email</h5>
                    <p>info@project29.rw<br>support@project29.rw</p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <i class="bi bi-phone-fill" style="font-size: 3rem; color: var(--saffron-yellow);"></i>
                    <h5 class="mt-3">Phone</h5>
                    <p>+250 XXX XXX XXX<br>+250 YYY YYY YYY</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-uppercase mb-3" style="color: var(--saffron-yellow);">
                        Project 29</h5>
                    <p>Building a brighter future through grassroots mobilization and civic engagement.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-uppercase mb-3" style="color: var(--saffron-yellow);">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#cta">Join Us</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-uppercase mb-3" style="color: var(--saffron-yellow);">Follow Us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-decoration-none fs-4"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: var(--saffron-yellow);">
            <div class="text-center">
                <p>Lofa County Electoral District #5 | Liberia</p>
                Not Too Young To Lead Movement | Youth Engagement for 2029 Elections
                <p class="mb-0">&copy; {{ date('Y') }} Project 29. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
