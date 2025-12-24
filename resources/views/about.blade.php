@extends('layouts.app')
@section('title')
@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container page-header-content">
            <h1>About James Papay Kwabo Jr.</h1>
            <p>Life Story & Leadership Journey of a Liberian Educator, Media Innovator, and Community Advocate</p>
        </div>
    </section>

    <!-- Profile Section -->
    <section class="profile-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="profile-image-wrapper text-center">
                        <img src="{{ asset('img/jpk-1.jpeg') }}" alt="James Papay Kwabo Jr." class="profile-image">
                        <div class="profile-badge">
                            <i class="bi bi-award-fill"></i> Community Leader
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile-content">
                        <h2>From Rural Liberia to National Leadership</h2>
                        <div
                            style="background: var(--light-bg); padding: 1.5rem; border-left: 4px solid var(--saffron-yellow); border-radius: 10px; margin-bottom: 2rem;">
                            <p class="lead mb-0" style="font-style: italic; color: var(--navy-blue);">
                                "Leadership is defined by service, integrity, and the courage to act on behalf of others."
                            </p>
                        </div>

                        <p>James Papay Kwabo Jr. was born on <strong>November 26, 1989</strong>, in Luyeama Town, Zorzor
                            District, Lofa County, Liberia. Raised in rural Liberia, he experienced both the warmth of his
                            community and the challenges faced by many underserved populations.</p>

                        <p>Orphaned at a young age and surviving a serious accident at 17, James developed resilience and a
                            lifelong commitment to uplifting others—values that continue to guide his work today. These
                            formative experiences shaped his people-centered leadership approach and his belief that
                            sustainable national development must begin at the community level.</p>

                        <div class="mt-4">
                            <a href="#journey" class="btn btn-cta me-2 mb-2">
                                <i class="bi bi-book"></i> Read Full Story
                            </a>
                            <a href="#contact" class="btn btn-outline-primary mb-2"
                                style="border-color: var(--navy-blue); color: var(--navy-blue); border-radius: 50px; padding: 1rem 2rem; font-weight: 600;">
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
                <h2 class="section-title">Education & Professional Formation</h2>
                <p class="section-subtitle">Building the foundation for leadership and community impact</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="journey-card">
                        <div class="journey-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h4>Master's in Public Sector Management (2022)</h4>
                        <p><strong>Cuttington University School of Graduate and Professional Studies</strong></p>
                        <p>Advanced studies in public administration, policy development, and ethical governance, equipping
                            him with the tools to drive systemic change and institutional reform.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="journey-card">
                        <div class="journey-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <h4>Bachelor of Arts in Mass Communication (2015)</h4>
                        <p><strong>United Methodist University - Magna Cum Laude</strong></p>
                        <p>Graduated with highest honors, demonstrating exceptional academic excellence and dedication to
                            the field of communication and media.</p>
                    </div>
                </div>

                <div class="col-lg-12 mb-2">
                    <div class="journey-card"
                        style="background: linear-gradient(135deg, var(--navy-blue), #003366); color: white;">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <div class="journey-icon" style="margin: 0 auto;">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h4 style="color: var(--saffron-yellow);">Lecturer at Lofa County University</h4>
                                <p class="mb-0 text-white">Today, James serves as a Lecturer at Lofa County University,
                                    mentoring the next generation of leaders in communication, civic engagement, and ethical
                                    leadership. His teaching philosophy emphasizes practical application, critical thinking,
                                    and community-centered problem-solving.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alternative Youth Radio Section -->
    <!-- Alternative Youth Radio Section -->
    <section class="profile-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <!-- Image Column -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="profile-image-wrapper text-center">
                        <img src="{{ asset('img/blog-3.jpeg') }}" alt="Alternative Youth Radio" class="profile-image">
                        <div class="profile-badge">
                            <i class="bi bi-mic-fill"></i> Founder, AYR
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-7">
                    <div class="profile-content">
                        <h2>Founder, Alternative Youth Radio (AYR)</h2>

                        <div
                            style="background: var(--light-bg); padding: 1.5rem; border-left: 4px solid var(--saffron-yellow); border-radius: 10px; margin-bottom: 2rem;">
                            <p class="lead mb-0" style="font-style: italic; color: var(--navy-blue);">
                                "What began in a shipping container has grown into a hub for youth empowerment and civic
                                engagement."
                            </p>
                        </div>

                        <p class="lead">
                            In <strong>2016</strong>, James founded <strong>Alternative Youth Radio (AYR)</strong>,
                            Liberia’s first youth-led community media initiative in rural Lofa County.
                        </p>

                        <p>
                            Under his visionary leadership, AYR has evolved from a modest beginning into a thriving
                            center for community empowerment, civic dialogue, and social transformation—serving as
                            a trusted voice for young people and marginalized communities.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Impact Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="journey-card text-center">
                        <div class="journey-icon mx-auto">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>100+</h4>
                        <p>Young people provided with employment and skills training opportunities</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="journey-card text-center">
                        <div class="journey-icon mx-auto">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>
                        <h4>Community Voice</h4>
                        <p>Amplified voices and expanded access to information across Lofa County</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="journey-card text-center">
                        <div class="journey-icon mx-auto">
                            <i class="bi bi-chat-square-text-fill"></i>
                        </div>
                        <h4>Civic Dialogue</h4>
                        <p>Platform for peacebuilding, civic engagement, and local innovation</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="journey-card text-center">
                        <div class="journey-icon mx-auto">
                            <i class="bi bi-lightning-fill"></i>
                        </div>
                        <h4>Impact Hub</h4>
                        <p>Expanded into a multimedia center combining journalism and leadership development</p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">International Exposure & Leadership Recognition</h2>
                <p class="section-subtitle">Representing Liberia on global platforms</p>
            </div>

            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2008</span>
                        <h5>Best Student Council President</h5>
                        <p>Educational Leadership recognition for outstanding leadership exhibited as the third Student
                            Council President at the Zorzor Central High School.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2013</span>
                        <h5>Best Students Advocate</h5>
                        <p>Recognized by the graduating class at the United Methodist University for outstanding and
                            non-violent advocacy initiatives at the University.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2015</span>
                        <h5>Magna Cum Laude Graduate</h5>
                        <p>Bachelor of Arts in Mass Communication with emphasis in Broadcasting - recognized for academic
                            excellence and outstanding performance at United Methodist University.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2016</span>
                        <h5>Founded Alternative Youth Radio</h5>
                        <p>Established Liberia's first youth-led community media initiative in rural Lofa County, creating a
                            platform for youth empowerment and civic engagement.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2017</span>
                        <h5>Liberia-Colombia Youth Exchange Program</h5>
                        <p><strong>Bogotá, Colombia</strong> - Engaged in youth leadership, civic participation, and
                            cross-cultural collaboration through international exchange.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2019</span>
                        <h5>Mandela Washington Fellowship (YALI)</h5>
                        <p><strong>Young African Leaders Initiative, U.S. Department of State</strong> - Boise State
                            University, USA. Specialized training in civic leadership, ethical governance, and public sector
                            management.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2022</span>
                        <h5>Master's in Public Sector Management</h5>
                        <p>Completed graduate studies at Cuttington University School of Graduate and Professional Studies,
                            advancing expertise in governance and policy development.</p>
                    </div>
                </div>

                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2024</span>
                        <h5>MTN MoMo Hero of Change Award</h5>
                        <p>National recognition for youth empowerment, community development, and media innovation -
                            honoring outstanding contributions to Liberian society.</p>
                    </div>
                </div>

                <div class="timeline-item left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2025</span>
                        <h5>Project 29 - Not Too Young To Lead</h5>
                        <p>Launched the Not Too Young To Lead Movement, mobilizing youth for civic participation and
                            inclusive governance toward the 2029 elections.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2025</span>
                        <h5>Project 29 - Not Too Young To Lead</h5>
                        <p>Launched the Not Too Young To Lead Movement, mobilizing youth for civic participation and
                            inclusive governance toward the 2029 elections.</p>
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
                    <img src="{{ asset('img/jpk-3.jpeg') }}" alt="University Lecture" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Teaching at University</h5>
                        <p>Educating future leaders</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('img/jpk-1.jpeg') }}" alt="YALI Fellowship" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>YALI Fellowship 2019</h5>
                        <p>Mandela Washington Fellowship experience</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('img/blog-11.jpeg') }}" alt="Community Work" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Community Engagement</h5>
                        <p>Working directly with rural communities</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('img/blog-1.jpeg') }}" alt="Youth Training" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Youth Empowerment</h5>
                        <p>Training young leaders in Lofa County</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('img/blog-14.jpeg') }}" alt="Alternative Youth Radio" class="gallery-image">
                    <div class="gallery-overlay">
                        <h5>Alternative Youth Radio</h5>
                        <p>Amplifying voices through media</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('img/founder.jpeg') }}" alt="MTN Award" class="gallery-image">
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
                <h2 class="section-title">Vision and Values</h2>
                <p class="section-subtitle">Building a more just and inclusive Liberia</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Youth Empowerment</h4>
                        <p>Youth, especially those in rural Liberia, are empowered with skills, platforms, and leadership
                            opportunities to drive positive change.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h4>Equitable Access</h4>
                        <p>Rural communities have equitable access to information, education, and development opportunities
                            without geographic barriers.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Institutional Accountability</h4>
                        <p>Institutions are accountable, inclusive, and responsive to the needs of all citizens, especially
                            the marginalized.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>
                        <h4>Freedom of Expression</h4>
                        <p>Civic participation and freedom of expression are encouraged, protected, and celebrated as
                            fundamental rights.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ongoing Commitment Section -->
    <section class="" style="padding: 80px 0; background: var(--light-bg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('img/blog-2.jpeg') }}" alt="James with Community" class="img-fluid rounded shadow"
                        style="border: 4px solid var(--saffron-yellow);">
                </div>
                <div class="col-lg-6 ">
                    <h2 class="section-title text-left">Ongoing Commitment</h2>

                    <div
                        style="background: white; padding: 1.5rem; border-left: 4px solid var(--saffron-yellow); border-radius: 10px; margin-bottom: 2rem;">
                        <p class="lead mb-0" style="font-style: italic; color: var(--navy-blue);">
                            "Every young person empowered, every community strengthened, is a step toward a more just and
                            inclusive Liberia."
                        </p>
                    </div>
                    <p class="lead">James continues to bridge local realities with international best practices, creating
                        sustainable change through education, media, advocacy, and leadership development.</p>
                    <p>His work reflects a deep commitment to community-driven solutions, ethical leadership, and scalable
                        impact. Whether in the classroom at Lofa County University, behind the microphone at Alternative
                        Youth Radio, or mobilizing communities through Project 29, James embodies servant leadership that
                        prioritizes the voices and needs of those often left behind.</p>
                    <p>Through strategic partnerships, innovative programming, and unwavering dedication, he continues to
                        demonstrate that lasting change begins at the grassroots level and that every individual has the
                        potential to contribute to national progress.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-sections">
        <div class="container">
            <h2>Join the Movement for Change</h2>
            <p>Together, we can build a more inclusive, prosperous, and resilient Liberia. Your voice matters.</p>
            <a href="index.html#get-involved" class="btn btn-cta">
                <i class="bi bi-hand-thumbs-up"></i> Get Involved Today
            </a>
        </div>
    </section>
@endsection
