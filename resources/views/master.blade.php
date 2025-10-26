<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar fixed-top top-navbar">
        <div class="container-fluid">
            <div>
                <button class="btn sidebar-toggle me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainSidebar" aria-controls="mainSidebar">
                    &#9776; </button>
                
                <a class="navbar-brand" href="#">
                    @yield('page-title', 'Dashboard')
                </a>
            </div>
            </div>
    </nav>

    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mainSidebar" aria-labelledby="mainSidebarLabel">
        
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mainSidebarLabel">App Pegawai</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        
        <div class="offcanvas-body">
            <nav>
                <ul class="sidebar-nav">
                    <li><a href="{{ route('employees.index') }}">Employee</a></li> 
                    <li><a href="{{ route('departments.index') }}">Department</a></li>
                    <li><a href="{{ route('positions.index') }}">Position</a></li>
                    <li><a href="{{ route('attendances.index') }}">Attendance</a></li>
                    <li><a href="{{ route('salaries.index') }}">Salary</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="main-content">
        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} App Pegawai</p>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @stack('scripts')
</body>
</html>