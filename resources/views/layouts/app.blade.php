<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Team Kwabo') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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
            position: relative;
            overflow: hidden;
            font-family: "Inter", sans-serif;
            height: 100vh;
            min-height: 600px;
        }

        /* Remove the existing ::before pseudo-element background */
        .hero-section::before {
            display: none;
        }

        /* Full-width slider styles */
        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-slider .carousel-inner,
        .hero-slider .carousel-item {
            height: 100%;
        }

        .hero-slider .carousel-item img {
            width: 100%;
            height: auto;
        }

        /* Dark overlay for better text readability */
        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg,
                    rgba(0, 33, 102, 0.7) 0%,
                    rgba(0, 51, 102, 0.5) 100%);
            z-index: 2;
            pointer-events: none;
            /* CRITICAL FIX: Allow clicks to pass through */
        }

        /* Text overlay positioning */
        .hero-text-overlay {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-50%);
            z-index: 20;
            /* INCREASED z-index */
            color: white;
            text-align: left;
            pointer-events: none;
            /* CRITICAL FIX: Container doesn't block clicks */
        }

        /* CRITICAL FIX: Re-enable pointer events for interactive elements */
        .hero-text-overlay .container,
        .hero-text-overlay .row,
        .hero-text-overlay .col-lg-8,
        .hero-text-overlay .col-xl-6 {
            pointer-events: none;
        }

        .hero-text-overlay h1,
        .hero-text-overlay p,
        .hero-text-overlay .btn,
        .hero-text-overlay a {
            pointer-events: auto;
            /* Re-enable clicks for text and buttons */
        }

        /* Enhanced text styles for better visibility */
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-subtitle {
            font-size: 1.4rem;
            font-weight: 500;
            margin-bottom: 1rem;
            color: #e8f4f8;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .hero-text-overlay .lead {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #f0f8ff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* Button enhancements for overlay */
        .hero-text-overlay .btn {
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            /* ADDED: Ensure proper positioning */
            z-index: 25;
            /* ADDED: Extra z-index for buttons */
        }

        .hero-text-overlay .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        /* Carousel controls positioning */
        .carousel-control-prev,
        .carousel-control-next {
            z-index: 30;
            /* INCREASED: Higher than text overlay */
            opacity: 0.8;
            pointer-events: auto;
            /* ENSURE: Controls are clickable */
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section {
                height: 70vh;
                min-height: 500px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .hero-text-overlay .lead {
                font-size: 1rem;
            }

            .hero-text-overlay {
                text-align: center;
            }

            .hero-text-overlay .col-lg-8 {
                padding: 0 15px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .hero-text-overlay .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
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
            padding: 80px 0;
            text-align: center;
        }

        /* .about img{
            height: 800px;
            width: auto;
        } */
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
            padding: 30px 0;
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
        .cta-sections {
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
            text-align: center;
        }

        .member-stats {
            padding: 80px 0;
            background: white;
        }

        .member-stats .section-title {
            color: var(--navy-blue);
            font-weight: bold;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;

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
    <!-- Scripts -->
    @stack('styles')
</head>

<body>
    {{-- Navbar --}}

    @include('layouts.navbar')
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

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
