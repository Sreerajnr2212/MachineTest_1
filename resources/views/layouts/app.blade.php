<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        
        .sidebar a:hover {
            background-color: #007bff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .header {
            padding: 10px;
            background-color: #f8f9fa;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
            margin-left: 250px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="list-group list-group-flush">
        <a href="{{ route('brands.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('brands.index') ? 'active' : '' }}">Brands</a>
        <a href="{{ route('car-models.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('car-models.index') ? 'active' : '' }}">Car Models</a>
        <a href="{{ route('brands.logos') }}" class="list-group-item list-group-item-action {{ request()->routeIs('brands.logos') ? 'active' : '' }}">Logos</a>

    </div>
</div>
    <div class="header">
        <h1>Car Management</h1>
    </div>
    <div class="content mt-5">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
