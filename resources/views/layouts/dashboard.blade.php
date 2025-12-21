{{-- resources/views/layouts/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Project 29</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --saffron-yellow: #FFB300;
            --navy-blue: #001F3F;
        }

        body {
            background-color: #f8f9fa;
            font-family: "Inter", sans-serif;
        }

        .sidebar {
            background-color: var(--navy-blue);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar-brand {
            color: var(--saffron-yellow);
            font-weight: bold;
            font-size: 1.5rem;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
        }

        .sidebar-nav {
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            margin: 5px 0;
        }

        .sidebar-nav a {
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: var(--saffron-yellow);
            color: var(--navy-blue);
        }

        .sidebar-nav i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .topbar {
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: -20px -20px 30px -20px;
            font-family: "Inter", sans-serif;
        }

        .stat-card {
            border-left: 4px solid var(--saffron-yellow);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: var(--saffron-yellow);
            border-color: var(--saffron-yellow);
            color: var(--navy-blue);
        }

        .btn-primary:hover {
            background-color: #FFA000;
            border-color: #FFA000;
            color: var(--navy-blue);
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    {{-- Sidebar --}}
    <div class="sidebar " id="sidebar">
        <a href="{{ route('home') }}" class="sidebar-brand">
            <i class="bi bi-flag-fill"></i> PROJECT 29
        </a>

        <ul class="sidebar-nav mt-4">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            @role('admin|manager')
                <li>
                    <a href="{{ route('members.index') }}" class="{{ request()->routeIs('members.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Members
                    </a>
                </li>

                <li>
                    <a href="{{ route('districts.index') }}"
                        class="{{ request()->routeIs('districts.*') ? 'active' : '' }}">
                        <i class="bi bi-geo-alt"></i> Districts
                    </a>
                </li>

                <li>
                    <a href="{{ route('clans.index') }}" class="{{ request()->routeIs('clans.*') ? 'active' : '' }}">
                        <i class="bi bi-diagram-3"></i> Clans
                    </a>
                </li>

                <li>
                    <a href="{{ route('towns.index') }}" class="{{ request()->routeIs('towns.*') ? 'active' : '' }}">
                        <i class="bi bi-building"></i> Towns
                    </a>
                </li>
            @endrole

            @role('admin')
                <li>
                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge"></i> Users
                    </a>
                </li>
            @endrole

            <li class="mt-4">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        {{-- Topbar --}}
        <div class="topbar">
            <button class="btn btn-light d-md-none" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>

            <div class="d-flex align-items-center gap-3">
                <span class="text-muted">Welcome, {{ auth()->user()->fname }} {{ auth()->user()->mid_name }}
                    {{ auth()->user()->lname }}</span>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        @if (auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar"
                                class="rounded-circle" width="30" height="30">
                        @else
                            <i class="bi bi-person-circle"></i>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Alerts --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
    @stack('scripts')
</body>

</html>
