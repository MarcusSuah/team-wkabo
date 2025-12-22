<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About James Papy Kwabo Jr. - Life Story & Leadership Journey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --saffron-yellow: #FFB300;
            --navy-blue: #001F3F;
            --light-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            padding-top: 76px;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background-color: var(--navy-blue) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--saffron-yellow) !important;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .nav-link {
            color: white !important;
            transition: color 0.3s;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--saffron-yellow) !important;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--navy-blue) 0%, #003366 100%);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('img/header-bg.jpg') no-repeat center;
            background-size: cover;
            opacity: 0.1;
            z-index: 0;
        }

        .page-header-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .page-header h1 {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.3rem;
            color: var(--saffron-yellow);
            max-width: 800px;
            margin: 0 auto;
        }

        /* Profile Section */
        .profile-section {
            padding: 80px 0;
            background: white;
        }

        .profile-image-wrapper {
            position: relative;
            margin-bottom: 2rem;
        }

        .profile-image {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            border: 5px solid var(--saffron-yellow);
        }

        .profile-badge {
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--saffron-yellow);
            color: var(--navy-blue);
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(255, 179, 0, 0.4);
            white-space: nowrap;
        }

        .profile-content {
            padding: 2rem 0;
        }

        .profile-content h2 {
            color: var(--navy-blue);
            font-weight: 900;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .profile-content .lead {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .profile-content p {
            font-size: 1.05rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .highlight-text {
            background: linear-gradient(135deg, var(--saffron-yellow), #FFA000);
            color: var(--navy-blue);
            padding: 0.2rem 0.6rem;
            border-radius: 5px;
            font-weight: 600;
        }

        /* Life Journey Section */
        .journey-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

        .section-title {
            color: var(--navy-blue);
            font-weight: 900;
            font-size: 2.8rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 4px;
            background: var(--saffron-yellow);
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 3rem;
        }

        .journey-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border-left: 5px solid var(--saffron-yellow);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .journey-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .journey-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--saffron-yellow), #FFA000);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--navy-blue);
            margin-bottom: 1.5rem;
        }

        .journey-card h4 {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .journey-card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 0;
        }

        /* Timeline Section */
        .timeline-section {
            padding: 80px 0;
            background: white;
        }

        .timeline {
            position: relative;
            padding: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--saffron-yellow);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            width: 50%;
            padding: 0 3rem;
        }

        .timeline-item.left {
            left: 0;
            text-align: right;
        }

        .timeline-item.right {
            left: 50%;
            text-align: left;
        }

        .timeline-dot {
            position: absolute;
            top: 0;
            width: 20px;
            height: 20px;
            background: var(--saffron-yellow);
            border: 4px solid var(--navy-blue);
            border-radius: 50%;
            z-index: 1;
        }

        .timeline-item.left .timeline-dot {
            right: -10px;
        }

        .timeline-item.right .timeline-dot {
            left: -10px;
        }

        .timeline-content {
            background: var(--light-bg);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .timeline-content:hover {
            transform: scale(1.05);
        }

        .timeline-year {
            display: inline-block;
            background: var(--navy-blue);
            color: var(--saffron-yellow);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .timeline-content h5 {
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .timeline-content p {
            color: #666;
            margin-bottom: 0;
        }

        /* Image Gallery Section */
        .gallery-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 31, 63, 0.9), transparent);
            padding: 1.5rem;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        /* Values Section */
        .values-section {
            padding: 80px 0;
            background: white;
        }

        .value-card {
            background: linear-gradient(135deg, var(--navy-blue), #003366);
            color: white;
            border-radius: 15px;
            padding: 2.5rem;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s;
            text-align: center;
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-icon {
            font-size: 3rem;
            color: var(--saffron-yellow);
            margin-bottom: 1.5rem;
        }

        .value-card h4 {
            color: var(--saffron-yellow);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .value-card p {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.7;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--saffron-yellow), #FFA000);
            padding: 80px 0;
            text-align: center;
        }

        .cta-section h2 {
            color: var(--navy-blue);
            font-weight: 900;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .cta-section p {
            color: var(--navy-blue);
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn-cta {
            background: var(--navy-blue);
            color: white;
            padding: 1rem 3rem;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s;
        }

        .btn-cta:hover {
            background: #003366;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 31, 63, 0.3);
        }

        /* Footer */
        .footer {
            background-color: var(--navy-blue);
            color: white;
            padding: 40px 0 20px;
        }

        .footer h5 {
            color: var(--saffron-yellow);
            font-weight: 700;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: var(--saffron-yellow);
        }

        /* Mobile Responsive */
        @media (max-width: 992px) {
            .page-header h1 {
                font-size: 2.5rem;
            }

            .page-header p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 4rem;
                padding-right: 0;
                text-align: left !important;
            }

            .timeline-item.left,
            .timeline-item.right {
                left: 0;
            }

            .timeline-dot {
                left: 10px !important;
            }

            .profile-badge {
                position: static;
                transform: none;
                display: inline-block;
                margin-top: 1rem;
            }
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .profile-content h2 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .cta-section h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="bi bi-person-badge"></i> JAMES PAPY KWABO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container page-header-content">
            <h1>About James Papy Kwabo Jr.</h1>
            <p>Life Story & Leadership Journey of a Liberian Educator, Media Innovator, and Community Advocate</p>
        </div>
    </section>

    <!-- Profile Section -->
    <section class="profile-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="profile-image-wrapper text-center">
                        <img src="img/james-profile.jpg" alt="James Papy Kwabo Jr." class="profile-image">
                        <div class="profile-badge">
                            <i class="bi bi-award-fill"></i> Community Leader
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile-content">
                        <h2>A Journey of Resilience & Purpose</h2>
                        <p class="lead">James Papy Kwabo Jr. is a <span class="highlight-text">Liberian educator</span>, <span class="highlight-text">media innovator</span>, <span class="highlight-text">youth development practitioner</span>, and <span class="highlight-text">community advocate</span> whose leadership journey is deeply rooted in rural Lofa County and shaped by both local realities and international exposure.</p>

                        <p>Born on <strong>November 26, 1989</strong>, in Luyeama Town, Zorzor District, Lofa County, James experienced significant hardship early in life, including the loss of both parents and a near-fatal accident at the age of 17 that temporarily left him paralyzed.</p>

                        <p>His recovery, made possible through community support, instilled in him a lifelong commitment to service, resilience, and giving voice to marginalized communities. These formative experiences continue to inform his people-centered leadership approach and his belief that <strong>sustainable national development must begin at the community level</strong>.</p>

                        <div class="mt-4">
                            <a href="#journey" class="btn btn-cta me-2 mb-2">
                                <i class="bi bi-book"></i> Read Full Story
                            </a>
                            <a href="index.html#contact" class="btn btn-outline-primary mb-2" style="border-color: var(--navy-blue); color: var(--navy-blue); border-radius: 50px; padding: 1rem 2rem; font-weight: 600;">
                                <i class="bi bi-envelope"></i> Get in Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Life Journey Section -->
    <section id="journey" class="journey-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Life Journey</h2>
                <p class="section-subtitle">From adversity to advocacy, shaping a legacy of service</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="journey-card">
                        <div class="journey-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h4>Early Life & Adversity</h4>
                        <p>Born in Luyeama Town, Zorzor District, James faced profound challenges from an early age. The loss of both parents and a near-fatal accident at 17 that left him temporarily paralyzed tested his resolve. Yet, these hardships became the foundation of his unwavering commitment to community service and resilience.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="journey-card">
                        <div class="journey-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Community Support & Recovery</h4>
                        <p>James's recovery was made possible through the overwhelming support of his community. This experience of collective care and solidarity shaped his belief in the power of community-driven development and inspired his lifelong dedication to giving back and amplifying marginalized voices.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="journey-card">
                        <div class="journey-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <h4>Education & Empowerment</h4>
                        <p>Despite obstacles, James pursued education with determination. He became a lecturer at Lofa County University, dedicating himself to empowering the next generation through knowledge, critical thinking, and civic engagement. Education became his tool for transformation.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="journey-card">
                        <div class="journey-icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <h4>Media Innovation & Youth Voice</h4>
                        <p>Recognizing the power of media in driving social change, James founded Alternative Youth Radio to amplify youth voices and promote civic participation. This platform has become a vital space for dialogue, advocacy, and community engagement across Lofa County.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Leadership Milestones</h2>
                <p class="section-subtitle">Key moments that shaped a leader</p>
            </div>

            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">1989</span>
                        <h5>Born in Luyeama Town</h5>
                        <p>Born in Zorzor District, Lofa County, Liberia - the beginning of a journey marked by resilience.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2006</span>
                        <h5>Overcoming Adversity</h5>
                        <p>At age 17, survived a near-fatal accident that left him temporarily paralyzed. Community support enabled his recovery.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2015</span>
                        <h5>Founded Alternative Youth Radio</h5>
                        <p>Established a media platform dedicated to amplifying youth voices and promoting civic engagement in rural communities.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2019</span>
                        <h5>Mandela Washington Fellowship</h5>
                        <p>Selected as a YALI Fellow (Young African Leaders Initiative), representing Liberia in the prestigious Mandela Washington Fellowship.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2020</span>
                        <h5>Lecturer at Lofa County University</h5>
                        <p>Appointed as lecturer, dedicating his expertise to educating and mentoring the next generation of Liberian leaders.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2024</span>
                        <h5>MTN Hero of Change Award</h5>
                        <p>Recognized nationally for outstanding community leadership and impact through the MTN Hero of Change Award.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2025</span>
                        <h5>Project 29 - Not Too Young To Lead</h5>
                        <p>Launched the Not Too Young To Lead Movement, mobilizing youth for civic participation toward the 2029 elections.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Moments in Leadership</h2>
                <p class="section-subtitle">Capturing the journey through powerful images</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="img/gallery/community-work.jpg" alt="Community Work" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Community Engagement</h5>
                        <p>Working directly with rural communities</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="img/gallery/youth-training.jpg" alt="Youth Training" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Youth Empowerment</h5>
                        <p>Training young leaders in Lofa County</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="img/gallery/radio-station.jpg" alt="Alternative Youth Radio" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Alternative Youth Radio</h5>
                        <p>Amplifying voices through media</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="img/gallery/yali-fellowship.jpg" alt="YALI Fellowship" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>YALI Fellowship 2019</h5>
                        <p>Mandela Washington Fellowship experience</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="img/gallery/university-lecture.jpg" alt="University Lecture" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Teaching at University</h5>
                        <p>Educating future leaders</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="img/gallery/award-ceremony.jpg" alt="MTN Award" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>MTN Hero of Change 2024</h5>
                        <p>Recognition for community impact</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values & Philosophy Section -->
    <section class="values-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Leadership Philosophy & Values</h2>
                <p class="section-subtitle">The principles that guide every action</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h4>Service Above Self</h4>
                        <p>Commitment to community-centered leadership that prioritizes the needs of the marginalized and vulnerable.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Resilience & Hope</h4>
                        <p>Drawing from personal adversity to inspire others to overcome challenges and pursue their dreams.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Inclusive Development</h4>
                        <p>Believing that sustainable national progress must begin at the community level with inclusive participation.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>
                        <h4>Amplifying Voices</h4>
                        <p>Dedicated to giving voice to the voiceless and creating platforms for youth and marginalized communities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Join the Movement for Change</h2>
            <p>Together, we can build a more inclusive, prosperous, and resilient Liberia. Your voice matters.</p>
            <a href="index.html#get-involved" class="btn btn-cta">
                <i class="bi bi-hand-thumbs-up"></i> Get Involved Today
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class
