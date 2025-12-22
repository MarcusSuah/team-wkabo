<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - James Papy Kwabo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --saffron-yellow: #FFB300;
            --navy-blue: #001F3F;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: "Inter", sans-serif;
            padding-top: 76px;
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
            padding: 80px 0 60px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.2rem;
            color: var(--saffron-yellow);
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 30px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .filter-btn {
            background: white;
            border: 2px solid var(--navy-blue);
            color: var(--navy-blue);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            margin: 0.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--saffron-yellow);
            border-color: var(--saffron-yellow);
            color: var(--navy-blue);
        }

        /* Blog Cards */
        .blog-section {
            padding: 60px 0;
            background: var(--light-bg);
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .blog-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .blog-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-category {
            display: inline-block;
            background: var(--saffron-yellow);
            color: var(--navy-blue);
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .blog-date {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .blog-title {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .blog-excerpt {
            color: #555;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .blog-author {
            display: flex;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #eee;
            margin-top: auto;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .btn-read-more {
            background: var(--navy-blue);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-read-more:hover {
            background: var(--saffron-yellow);
            color: var(--navy-blue);
        }

        /* Featured Post */
        .featured-post {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }

        .featured-post .row {
            align-items: center;
        }

        .featured-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .featured-content {
            padding: 3rem;
        }

        .featured-badge {
            background: var(--saffron-yellow);
            color: var(--navy-blue);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 1rem;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .sidebar-widget h4 {
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--saffron-yellow);
        }

        .recent-post {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .recent-post:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .recent-post-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 1rem;
        }

        .recent-post-content h6 {
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
            color: var(--navy-blue);
        }

        .recent-post-date {
            font-size: 0.8rem;
            color: #666;
        }

        /* Search Box */
        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 0.8rem 3rem 0.8rem 1rem;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 0.95rem;
        }

        .search-box button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--saffron-yellow);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: var(--navy-blue);
            cursor: pointer;
        }

        /* Footer */
        .footer {
            background-color: var(--navy-blue);
            color: white;
            padding: 40px 0 20px;
        }

        .footer h5 {
            color: var(--saffron-yellow);
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            color: var(--saffron-yellow);
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .featured-image {
                height: 250px;
            }

            .featured-content {
                padding: 2rem;
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
                    <li class="nav-item"><a class="nav-link" href="index.html#about">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>News, Articles & Updates</h1>
            <p>Stories of Impact, Leadership Insights, and Community Engagement</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="text-center">
                <button class="filter-btn active" data-filter="all">All Posts</button>
                <button class="filter-btn" data-filter="youth">Youth Development</button>
                <button class="filter-btn" data-filter="political">Political Leadership</button>
                <button class="filter-btn" data-filter="humanitarian">Humanitarian</button>
                <button class="filter-btn" data-filter="advocacy">Advocacy & Media</button>
                <button class="filter-btn" data-filter="events">Events</button>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Featured Post -->
                    <div class="featured-post">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="img/featured-blog.jpg" alt="Featured" class="featured-image">
                            </div>
                            <div class="col-md-6">
                                <div class="featured-content">
                                    <span class="featured-badge"><i class="bi bi-star-fill"></i> FEATURED POST</span>
                                    <h2 class="blog-title">Empowering Rural Youth: The Path Forward</h2>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> December 22, 2025 | <i
                                            class="bi bi-person"></i> James Papy Kwabo</p>
                                    <p class="blog-excerpt">As we look toward 2029, empowering rural youth remains at
                                        the heart of Liberia's development. Through education, mentorship, and civic
                                        engagement, we're building a generation of leaders ready to transform their
                                        communities...</p>
                                    <button class="btn-read-more">Read Full Article</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Grid -->
                    <div class="row">
                        <!-- Blog Post 1 -->
                        <div class="col-md-6 mb-4" data-category="youth">
                            <div class="blog-card">
                                <img src="img/blog1.jpg" alt="Blog" class="blog-image">
                                <div class="blog-content">
                                    <span class="blog-category">Youth Development</span>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> December 20, 2025</p>
                                    <h3 class="blog-title">Community Dialogue on Youth Employment</h3>
                                    <p class="blog-excerpt">Over 300 youth leaders gathered in Voinjama for a
                                        groundbreaking dialogue on employment opportunities and skills development in
                                        rural Lofa County...</p>
                                    <button class="btn-read-more">Read More</button>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post 2 -->
                        <div class="col-md-6 mb-4" data-category="advocacy">
                            <div class="blog-card">
                                <img src="img/blog2.jpg" alt="Blog" class="blog-image">
                                <div class="blog-content">
                                    <span class="blog-category">Advocacy & Media</span>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> December 15, 2025</p>
                                    <h3 class="blog-title">Alternative Youth Radio Celebrates 5 Years</h3>
                                    <p class="blog-excerpt">Marking five years of amplifying youth voices and driving
                                        community engagement across Lofa County. A celebration of impact and
                                        dedication...</p>
                                    <button class="btn-read-more">Read More</button>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post 3 -->
                        <div class="col-md-6 mb-4" data-category="humanitarian">
                            <div class="blog-card">
                                <img src="img/blog3.jpg" alt="Blog" class="blog-image">
                                <div class="blog-content">
                                    <span class="blog-category">Humanitarian</span>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> December 10, 2025</p>
                                    <h3 class="blog-title">Humanitarian Support Initiative Launched</h3>
                                    <p class="blog-excerpt">New program provides educational materials and scholarships
                                        to 200 vulnerable students in rural areas, ensuring no child is left behind...
                                    </p>
                                    <button class="btn-read-more">Read More</button>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post 4 -->
                        <div class="col-md-6 mb-4" data-category="political">
                            <div class="blog-card">
                                <img src="img/blog4.jpg" alt="Blog" class="blog-image">
                                <div class="blog-content">
                                    <span class="blog-category">Political Leadership</span>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> December 5, 2025</p>
                                    <h3 class="blog-title">Building Inclusive Governance in Lofa</h3>
                                    <p class="blog-excerpt">Town hall meetings across District #5 focused on
                                        transparency, accountability, and citizen participation in local governance...
                                    </p>
                                    <button class="btn-read-more">Read More</button>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post 5 -->
                        <div class="col-md-6 mb-4" data-category="events">
                            <div class="blog-card">
                                <img src="img/blog5.jpg" alt="Blog" class="blog-image">
                                <div class="blog-content">
                                    <span class="blog-category">Events</span>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> December 1, 2025</p>
                                    <h3 class="blog-title">Project 29 Recruitment Drive Success</h3>
                                    <p class="blog-excerpt">The Not Too Young To Lead Movement welcomes over 500 new
                                        members in the largest recruitment drive of the year...</p>
                                    <button class="btn-read-more">Read More</button>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Post 6 -->
                        <div class="col-md-6 mb-4" data-category="youth">
                            <div class="blog-card">
                                <img src="img/blog6.jpg" alt="Blog" class="blog-image">
                                <div class="blog-content">
                                    <span class="blog-category">Youth Development</span>
                                    <p class="blog-date"><i class="bi bi-calendar"></i> November 28, 2025</p>
                                    <h3 class="blog-title">Youth Leadership Training Program Launch</h3>
                                    <p class="blog-excerpt">Empowering the next generation of leaders through
                                        comprehensive training in civic engagement, public speaking, and community
                                        organizing...</p>
                                    <button class="btn-read-more">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Blog pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" style="color: var(--navy-blue);">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#"
                                    style="background-color: var(--saffron-yellow); border-color: var(--saffron-yellow); color: var(--navy-blue);">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" style="color: var(--navy-blue);">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" style="color: var(--navy-blue);">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" style="color: var(--navy-blue);">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Search Widget -->
                        <div class="sidebar-widget">
                            <h4>Search Articles</h4>
                            <div class="search-box">
                                <input type="text" placeholder="Search articles...">
                                <button><i class="bi bi-search"></i></button>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h4>Categories</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="#"
                                        style="color: var(--navy-blue); display: flex; justify-content: space-between;">
                                        <span><i class="bi bi-folder"></i> Youth Development</span>
                                        <span class="badge"
                                            style="background: var(--saffron-yellow); color: var(--navy-blue);">24</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        style="color: var(--navy-blue); display: flex; justify-content: space-between;">
                                        <span><i class="bi bi-folder"></i> Political Leadership</span>
                                        <span class="badge"
                                            style="background: var(--saffron-yellow); color: var(--navy-blue);">18</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        style="color: var(--navy-blue); display: flex; justify-content: space-between;">
                                        <span><i class="bi bi-folder"></i> Humanitarian</span>
                                        <span class="badge"
                                            style="background: var(--saffron-yellow); color: var(--navy-blue);">15</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        style="color: var(--navy-blue); display: flex; justify-content: space-between;">
                                        <span><i class="bi bi-folder"></i> Advocacy & Media</span>
                                        <span class="badge"
                                            style="background: var(--saffron-yellow); color: var(--navy-blue);">21</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        style="color: var(--navy-blue); display: flex; justify-content: space-between;">
                                        <span><i class="bi bi-folder"></i> Events</span>
                                        <span class="badge"
                                            style="background: var(--saffron-yellow); color: var(--navy-blue);">12</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget">
                            <h4>Recent Posts</h4>
                            <div class="recent-post">
                                <img src="img/recent1.jpg" alt="Recent" class="recent-post-img">
                                <div class="recent-post-content">
                                    <h6>Alternative Youth Radio Impact Report 2025</h6>
                                    <p class="recent-post-date"><i class="bi bi-calendar"></i> Dec 18, 2025</p>
                                </div>
                            </div>
                            <div class="recent-post">
                                <img src="img/recent2.jpg" alt="Recent" class="recent-post-img">
                                <div class="recent-post-content">
                                    <h6>Women in Leadership: Breaking Barriers</h6>
                                    <p class="recent-post-date"><i class="bi bi-calendar"></i> Dec 12, 2025</p>
                                </div>
                            </div>
                            <div class="recent-post">
                                <img src="img/recent3.jpg" alt="Recent" class="recent-post-img">
                                <div class="recent-post-content">
                                    <h6>Rural Education: Challenges and Solutions</h6>
                                    <p class="recent-post-date"><i class="bi bi-calendar"></i> Dec 8, 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="sidebar-widget"
                            style="background: linear-gradient(135deg, var(--navy-blue), #003366); color: white;">
                            <h4 style="color: var(--saffron-yellow); border-bottom-color: var(--saffron-yellow);">
                                Newsletter</h4>
                            <p>Subscribe to get the latest updates and articles delivered to your inbox.</p>
                            <input type="email" class="form-control mb-3" placeholder="Your email address"
                                style="border-radius: 25px;">
                            <button class="btn w-100"
                                style="background: var(--saffron-yellow); color: var(--navy-blue); font-weight: 600; border-radius: 25px;">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5>JAMES PAPY KWABO</h5>
                    <p>Empowering Youth. Strengthening Communities. Advancing Liberia.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html#about">About</a></li>
                        <li><a href="index.html#youth">Youth Development</a></li>
                        <li><a href="blog.html">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Connect</h5>
                    <div class="d-flex gap-2">
                        <a href="#" style="color: var(--saffron-yellow); font-size: 1.5rem;"><i
                                class="bi bi-facebook"></i></a>
                        <a href="#" style="color: var(--saffron-yellow); font-size: 1.5rem;"><i
                                class="bi bi-twitter"></i></a>
                        <a href="#" style="color: var(--saffron-yellow); font-size: 1.5rem;"><i
                                class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr style="border-color: rgba(255, 179, 0, 0.3);">
            <div class="text-center">
                <p>&copy; 2025 www.jamespapykwabo.org. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const blogCards = document.querySelectorAll('[data-category]');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                btn.classList.add('active');

                const filter = btn.dataset.filter;

                blogCards.forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.querySelector('.search-box input');
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            blogCards.forEach(card => {
                const title = card.querySelector('.blog-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.blog-excerpt').textContent.toLowerCase();
                if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                    card.parentElement.style.display = 'block';
                } else {
                    card.parentElement.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
