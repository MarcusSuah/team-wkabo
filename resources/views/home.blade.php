@extends('layouts.app')
@section('content')



    <section id="home" class="hero-section">
    <!-- Full-width Background Slider -->
    <div id="heroSlider" class="carousel slide hero-slider" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/hero-1.jpeg" class="d-block w-100" alt="" >
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="img/hero-2.jpeg" class="d-block w-100" alt="">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="img/hero-3.jpeg" class="d-block w-100" alt="">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="img/hero-4.jpeg" class="d-block w-100" alt="">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="img/hero-5.jpeg" class="d-block w-100" alt="">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="img/hero-6.jpeg" class="d-block w-100" alt="">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="img/hero-7.jpeg" class="d-block w-100" alt="">
                <div class="carousel-overlay"></div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Overlaid Text Content -->
    <div class="hero-text-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <h1 class="hero-title">
                        Empowering Youth. Strengthening Communities. Advancing Liberia.
                    </h1>

                    <p class="hero-subtitle">
                        Community Leader | Lecturer | Youth Advocate | Humanitarian
                    </p>

                    <p class="lead mb-4">
                        Based in rural Liberia (Lofa County), dedicated to transforming lives through
                        education, civic engagement, and inclusive leadership.
                    </p>

                    <a href="{{ route('members.create') }}" class="btn btn-primary btn-lg me-3 mb-2">
                        <i class="bi bi-person-plus-fill"></i> Join Now
                    </a>

                    <a href="#about" class="btn btn-outline-light btn-lg mb-2">
                        <i class="bi bi-info-circle"></i> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Who I Am Section -->
    <section id="about" class="who-section">
        <div class="container">
            <h2 class="section-title text-center w-100">Who is James Papy Kwabo?</h2>
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
                        <a href="{{ route('about.index') }}" class="btn btn-primary mt-3">Read Full Biography</a>
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
                    <p>Project 29 recruits, organizes, and mobilizes committed citizens to strengthen civic participation,
                        build accountable leadership, and drive practical community-led solutions that improve lives locally
                        together.</p>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">Our Vision</h3>
                    <p>By 2029, we aim to build a strong, connected network of citizens ready to engage fully in democratic
                        processes and drive meaningful community development.
                        Through focused recruitment, training, and mobilization, we are establishing a sustainable
                        foundation for active civic and social participation.</p>
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
            <div class="row mt-2">
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
                        <h4>2019 Mandela Fellow</h4>
                        <p class="mb-0">Us Department of State</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class=" bg-light member-stats">
        <div class="container">
            <h2 class="section-title text-center w-100">Members Stats</h2>
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
            <p class="lead mb-5 text-white">Join the movement for youth empowerment and community transformation. Your
                voice
                matters. Your participation counts!!</p>

            @auth
                <a href="{{ route('members.create') }}" class="btn btn-outline-light btn-lg me-3 mb-3">
                    <i class="bi bi-person-plus-fill"></i> Register as Member
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3 mb-3">
                    <i class="bi bi-hand-thumbs-up"></i> Volunteer
                </a>
            @endauth


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
                        <img src="{{ asset('img/blog-10.jpeg') }}" alt="News" class="news-image">
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
                        <img src="{{ asset('img/ayr.jpeg') }}" alt="News" class="news-image">
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
                        <img src="{{ asset('img/blog-8.jpeg') }}" alt="News" class="news-image">
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
@endsection
