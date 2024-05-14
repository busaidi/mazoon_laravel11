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
@include('admin.layouts.sidebar')
@include('admin.layouts.navbar')
<div id="contentWrapper">
@yield('content')
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
