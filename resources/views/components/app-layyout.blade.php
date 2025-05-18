<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Home Temperature</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --background-color: #f8f9fa;
            --text-light: #f8f9fa;
            --text-dark: #343a40;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .app-header {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .brand-logo {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .nav-item {
            position: relative;
            margin: 0 0.25rem;
        }

        .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }

        .nav-link i {
            margin-right: 0.25rem;
        }

        /* Mobile navigation styles */
        @media (max-width: 768px) {
            .navbar-collapse {
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar-toggler {
                border-color: rgba(255, 255, 255, 0.1);
                padding: 0.25rem 0.5rem;
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }
        }

        /* Footer styles */
        .app-footer {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 1rem 0;
            margin-top: 3rem;
        }

        /* Content container styles */
        .content-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="app-header">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                    <i class="fas fa-home me-2"></i>Smart Home Temperature
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                    aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ url('/rooms') }}" class="nav-link {{ request()->is('rooms*') ? 'active' : '' }}">
                                <i class="fas fa-door-open"></i> Rooms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/devices') }}" class="nav-link {{ request()->is('devices*') ? 'active' : '' }}">
                                <i class="fas fa-microchip"></i> Devices
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/temperature-readings') }}" class="nav-link {{ request()->is('temperature-readings*') ? 'active' : '' }}">
                                <i class="fas fa-thermometer-half"></i> Readings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-4">
        <div class="content-container">
            {{ $slot }}
        </div>
    </main>

    <footer class="app-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Smart Home Temperature. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Version 1.0</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>