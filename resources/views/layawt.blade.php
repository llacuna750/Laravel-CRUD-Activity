<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home Temperature Monitoring System</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* .container {
            border: 1px solid;
        } */

        .centerthis {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            /* border: 1px solid; */
            width: 100%;
        }
        /* a {
            border: 1px solid;
        } */
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <div class="centerthis">
                <a class="navbar-brand" href="{{ route('temperatures.index') }}">Smart Home Temperature System</a>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
