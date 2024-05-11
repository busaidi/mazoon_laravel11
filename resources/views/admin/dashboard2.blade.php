<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth:: Admin</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0; /* Ensure no default margin */
        }
        #navbar {
            flex-shrink: 0; /* Prevent the navbar from collapsing */
            width: calc(100% - 250px); /* Adjust width to fit next to sidebar */
            margin-left: 250px; /* Offset equal to sidebar width */
        }
        #sidebarMenu {
            background-color: #343a40; /* Dark background for the sidebar */
            color: #ffffff;
            width: 250px; /* Fixed sidebar width */
            flex-shrink: 0;
            height: 100vh; /* Full viewport height */
            position: fixed; /* Fixed position */
            top: 0; /* Align top */
            bottom: 0; /* Align bottom */
            overflow-y: auto; /* Allows scrolling */
            z-index: 1000; /* Ensures sidebar is on top on smaller screens */
        }
        #sidebarMenu .nav-link {
            color: #ffffff;
        }
        #sidebarMenu .nav-link:hover,
        #sidebarMenu .nav-link.active {
            background-color: #495057; /* Slightly lighter for hover */
        }
        #sidebarMenu .submenu .nav-link {
            background-color: #495057; /* Lighter background for submenu */
            color: #d1d1d1;
        }
        #contentWrapper {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
            margin-left: 250px; /* Offset for the sidebar */
        }
        @media (max-width: 992px) {
            #sidebarMenu {
                width: 100%; /* Full width on smaller screens */
                position: static; /* Static position on smaller screens */
            }
            #navbar {
                width: 100%; /* Full width */
                margin-left: 0; /* No offset */
            }
            #contentWrapper {
                margin-left: 0; /* No offset on smaller screens */
            }
        }
    </style>
</head>
<body class="bg-light">
<div id="sidebarMenu">
    <div class="navbar-brand py-3 px-3 text-white" style="background-color: #343a40;">Admin Panel</div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu1" data-bs-toggle="collapse" aria-expanded="false">Settings</a>
            <ul class="collapse list-unstyled submenu" id="submenu1">
                <li class="nav-item"><a class="nav-link" href="#">General</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Security</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu2" data-bs-toggle="collapse" aria-expanded="false">Reports</a>
            <ul class="collapse list-unstyled submenu" id="submenu2">
                <li class="nav-item"><a class="nav-link" href="#">Sales</a></li>
                <li class="nav-item"><a class="nav-link" href="#">User Activity</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
        </li>
    </ul>
</div>
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex me-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::guard('admin')->user()->name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="contentWrapper">
    <h1>Welcome to the Dashboard</h1>
    <p>Use the sidebar to navigate through various settings and reports.</p>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
