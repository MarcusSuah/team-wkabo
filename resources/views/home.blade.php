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

        .hero-section img {
            height: 500px;
            width: 600px;
            border-radius: 12px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        /* Who I Am Section */
        .who-section {
            padding: 80px 0;
            background: white;
        }

        .who-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
            border-left: 4px solid var(--saffron-yellow);
        }

        .abt-content {
            padding: 8opx 0;
            text-align: center;
        }

        /* .about img{
            height: 800px;
            width: auto;
        } */
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

        /* Focus Areas */
        .focus-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

        .focus-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            border-top: 4px solid var(--saffron-yellow);
        }

        .focus-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .focus-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--saffron-yellow), #FFA000);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: var(--navy-blue);
        }

        /* Impact Highlights */
        .impact-section {
            padding: 80px 0;
            background: white;
        }

        .impact-card {
            background: linear-gradient(135deg, var(--navy-blue), #003366);
            color: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            height: 100%;
            transition: transform 0.3s;
        }

        .impact-card:hover {
            transform: scale(1.05);
        }

        .impact-icon {
            font-size: 3rem;
            color: var(--saffron-yellow);
            margin-bottom: 1rem;
        }


        /* News Section */
        .news-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .news-content {
            padding: 1.5rem;
        }

        .news-date {
            color: var(--saffron-yellow);
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--navy-blue), #003366);
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .contact-section {
            padding: 80px 0;
            text-align: center;
        }

        /* Footer */
        .footer {
            background-color: var(--navy-blue);
            color: white;
            padding: 60px 0 20px;
        }

        .footer h5 {
            color: var(--saffron-yellow);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: var(--saffron-yellow);
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--saffron-yellow);
            color: var(--navy-blue);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            transition: transform 0.3s;
        }

        .social-links a:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }
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
                <i class="bi bi-flag-fill"></i> JAMES PAPAY KWABO
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
                        <a class="nav-link" href="#focus">Key Focus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#awards">Awards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blogs">Blog</a>
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

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center hero-content">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="hero-title">Empowering Youth. Strengthening Communities. Advancing Liberia.</h1>
                    <p class="hero-subtitle">Community Leader | Lecturer | Youth Advocate | Humanitarian</p>
                    <p class="lead mb-4">Based in rural Liberia (Lofa County), dedicated to transforming lives through
                        education, civic engagement, and inclusive leadership.</p>
                    <a href="#cta" class="btn btn-primary btn-lg me-3 mb-2 pl-3">
                        <i class="bi bi-person-plus-fill"></i> Join Now
                    </a>
                    <a href="#about" class="btn btn-outline-light btn-lg mb-2">
                        <i class="bi bi-info-circle"></i> Learn More
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="img/project29.jpeg" alt="James Papy Kwabo" class="img-fluid hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Who I Am Section -->
    <section id="about" class="who-section">
        <div class="container">
            <h2 class="section-title text-center w-100">Who I Am</h2>
            <div class="row mt-5">
                <div class="col-lg-6 mb-4 about">
                    <img src="{{ asset('img/Jpk.jpeg') }}" alt="James Papy Kwabo" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <div class="who-card">
                        <h3 class="mb-4" style="color: var(--navy-blue);">Community Leader. Educator. Change-Maker.
                        </h3>
                        <p class="lead">James Papy Kwabo is a distinguished community leader, lecturer at Lofa County
                            University, and passionate youth advocate committed to driving positive change in rural
                            Liberia.</p>
                        <p>As the founder of Alternative Youth Radio and a 2019 Mandela Washington Fellow (YALI), James
                            continues to amplify the voices of youth and marginalized communities, advocating for
                            education access, civic participation, and sustainable development.</p>
                        <p>James Papy Kwabo Jr. was born on November 26, 1989, in Luyeama Town, Zorzor District, Lofa
                            County, Liberia. Raised in rural Liberia, he experienced both the warmth of his community
                            and the challenges faced by many underserved populations. Orphaned at a young age and
                            surviving a serious accident at 17, James developed resilience and a lifelong commitment to
                            uplifting others; values that continue to guide his work today.</p>
                        <a href="about.html" class="btn btn-primary mt-3">Read Full Biography</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="#about" class="bg-light">
        <div class="container">
            <div class="abt-content">
                <h2 class="text-center section-title mt-5">About Project 29</h2>
            </div>
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

    <!-- Key Focus Areas -->
    <section id="focus" class="focus-section">
        <div class="container">
            <h2 class="section-title text-center w-100">Key Focus Areas</h2>
            <div class="row mt-5">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="focus-card text-center">
                        <div class="focus-icon mx-auto">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4 style="color: var(--navy-blue);">Youth & Community Development</h4>
                        <p>Empowering youth through mentorship, skills development, and civic engagement programs across
                            rural communities.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="focus-card text-center">
                        <div class="focus-icon mx-auto">
                            <i class="bi bi-building"></i>
                        </div>
                        <h4 style="color: var(--navy-blue);">Political Leadership & Governance</h4>
                        <p>Promoting inclusive governance, accountability, transparency, and ethical public leadership.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="focus-card text-center">
                        <div class="focus-icon mx-auto">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h4 style="color: var(--navy-blue);">Humanitarian Action</h4>
                        <p>Addressing education access, supporting vulnerable communities, and advancing social equity.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="focus-card text-center">
                        <div class="focus-icon mx-auto">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <h4 style="color: var(--navy-blue);">Advocacy & Media</h4>
                        <p>Amplifying youth voices through Alternative Youth Radio, advocating for human rights and
                            freedom of expression.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Highlights -->
    <section id="awards" class="impact-section">
        <div class="container">
            <h2 class="section-title text-center w-100">Impact Highlights</h2>
            <div class="row mt-5">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="impact-card text-center">
                        <i class="bi bi-broadcast impact-icon"></i>
                        <h4>Founder</h4>
                        <p class="mb-0">Alternative Youth Radio</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="impact-card text-center">
                        <i class="bi bi-book impact-icon"></i>
                        <h4>Lecturer</h4>
                        <p class="mb-0">Lofa County University</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="impact-card text-center">
                        <i class="bi bi-award impact-icon"></i>
                        <h4>2024 MTN Hero</h4>
                        <p class="mb-0">Hero of Change Award</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="impact-card text-center">
                        <i class="bi bi-globe impact-icon"></i>
                        <h4>2019 YALI Fellow</h4>
                        <p class="mb-0">Mandela Washington Fellowship</p>
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
    <!-- CTA Section -->
    <section id="cta" class="cta-section">
        <div class="container">
            <h2 class="display-4 fw-bold mb-4 section-title text-white">Ready to Make a Difference?</h2>
            <p class="lead mb-5">Join the movement for youth empowerment and community transformation. Your voice
                matters. Your participation counts.!!</p>
            <a href="volunteer.html" class="btn btn-primary btn-lg me-3 mb-3">
                <i class="bi bi-hand-thumbs-up"></i> Volunteer
            </a>
            <a href="partner.html" class="btn btn-outline-light btn-lg me-3 mb-3">
                <i class="bi bi-handshake"></i> Partner With Us
            </a>
            <a href="support.html" class="btn btn-outline-light btn-lg mb-3">
                <i class="bi bi-heart"></i> Support the Mission
            </a>
            @auth
                <a href="{{ route('members.create') }}" class="btn btn-outline-light btn-lg me-3 mb-3">
                    <i class="bi bi-person-plus-fill"></i> Register as Member
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg me-3 mb-3">
                    <i class="bi bi-person-plus-fill"></i> Get Started Today
                </a>
            @endauth
        </div>
    </section>

    <!-- Latest News -->
    <section id="blogs" class="news-section">
        <div class="container">
            <h2 class="section-title text-center w-100">Latest News & Updates</h2>
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="news-card">
                        <img src="img/news1.jpg" alt="News" class="news-image">
                        <div class="news-content">
                            <p class="news-date"><i class="bi bi-calendar"></i> December 20, 2025</p>
                            <h5 style="color: var(--navy-blue);">Community Dialogue on Youth Employment</h5>
                            <p>Over 300 youth leaders gathered in Voinjama for a groundbreaking dialogue on employment
                                opportunities...</p>
                            <a href="blog.html" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="news-card">
                        <img src="{{ asset('img/news.jpeg') }}" alt="News" class="news-image">
                        <div class="news-content">
                            <p class="news-date"><i class="bi bi-calendar"></i> December 15, 2025</p>
                            <h5 style="color: var(--navy-blue);">Alternative Youth Radio Celebrates 5 Years</h5>
                            <p>Marking five years of amplifying youth voices and driving community engagement across
                                Lofa County...</p>
                            <a href="blog.html" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="news-card">
                        <img src="img/news3.jpg" alt="News" class="news-image">
                        <div class="news-content">
                            <p class="news-date"><i class="bi bi-calendar"></i> December 10, 2025</p>
                            <h5 style="color: var(--navy-blue);">Humanitarian Support Initiative Launched</h5>
                            <p>New program provides educational materials and scholarships to 200 vulnerable students in
                                rural areas...</p>
                            <a href="blog.html" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="blog.html" class="btn btn-primary btn-lg">View All News & Articles</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-light">
        <div class="container">
            <h2 class="section-title text-center w-100">Contact</h2>
            <div class="row mt-5">
                <div class="col-lg-4 text-center mb-4">
                    <i class="bi bi-geo-alt-fill" style="font-size: 3rem; color: var(--saffron-yellow);"></i>
                    <h5 class="mt-3" style="color: var(--navy-blue);">Location</h5>
                    <p>Lofa County Electoral District #5<br>Zorzor City, Liberia</p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <i class="bi bi-envelope-fill" style="font-size: 3rem; color: var(--saffron-yellow);"></i>
                    <h5 class="mt-3" style="color: var(--navy-blue);">Email</h5>
                    <p>info@jamespapykwabo.org<br>contact@jamespapykwabo.org</p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <i class="bi bi-phone-fill" style="font-size: 3rem; color: var(--saffron-yellow);"></i>
                    <h5 class="mt-3" style="color: var(--navy-blue);">Phone</h5>
                    <p>+231 77 061 5847<br>+231 88 003 7475</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>JAMES PAPY KWABO</h5>
                    <p>Empowering Youth. Strengthening Communities. Advancing Liberia.</p>
                    <p class="mt-3"><small>Community Leader | Lecturer | Youth Advocate | Humanitarian</small></p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#about">About</a></li>
                        <li><a href="#youth">Youth Development</a></li>
                        <li><a href="#political">Political Leadership</a></li>
                        <li><a href="#awards">Awards</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="volunteer.html">Volunteer</a></li>
                        <li><a href="partner.html">Partnerships</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Follow Us</h5>
                    <div class="social-links mb-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                    <p><small>Project 29 | Not Too Young To Lead Movement</small></p>
                </div>
            </div>
            <hr style="border-color: rgba(255, 179, 0, 0.3); margin: 2rem 0;">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3">
                    <p class="mb-0">&copy; 2025 www.jamespapykwabo.org. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="privacy.html" class="me-3">Privacy Policy</a>
                    <a href="disclaimer.html">Disclaimer</a>
                </div>
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

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.backgroundColor = 'rgba(0, 31, 63, 0.98)';
            } else {
                navbar.style.backgroundColor = 'var(--navy-blue)';
            }
        });
    </script>
</body>

</html>
