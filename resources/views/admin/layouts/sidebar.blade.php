<div id="sidebarMenu">
    <div class="navbar-brand py-3 px-3 text-white" style="background-color: #343a40;">Admin Panel</div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu1" data-bs-toggle="collapse" aria-expanded="false">Messages</a>
            <ul class="collapse list-unstyled submenu" id="submenu1">
                <li class="nav-item"><a class="nav-link" href="{{route('admin.contacts')}}">All Message</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Security</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu2" data-bs-toggle="collapse" aria-expanded="false">Users</a>
            <ul class="collapse list-unstyled submenu" id="submenu2">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">All Users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.create') }}">Add New User</a></li>
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
