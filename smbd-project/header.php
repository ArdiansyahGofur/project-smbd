<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ojek Mobil.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e0f7fa; /* Light blue background */
        }
        .navbar {
            background-color: #007bff; /* Background color of the navbar */
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white; /* Navbar brand text color */
        }
        .navbar-nav .nav-link {
            font-size: 1rem; /* Text size */
            font-weight: 500; /* Text weight */
            color: white; /* Navbar link text color */
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #ffdd57; /* Text color on hover */
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%288%2C 8%2C 8%2C 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .navbar-nav .login-link {
            color: transparent; /* Make login text transparent */
            opacity: 0; /* Make login text hidden */
        }
        .header-block {
            padding: 1rem; /* Padding for the block */
            background-color: #007bff; /* Background color for the block */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional box shadow */
        }
    </style>
</head>
<body> 
    <div class="header-block">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="daftar_mobil.php">Daftar Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sewa.php">Sewa</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item d-lg-none">
                            <a class="nav-link login-link" href="admin/index.php">Login</a>
                        </li>
                    </ul>
                </div>
                <a class="nav-link d-none d-lg-block login-link" href="admin/index.php">Login</a>
            </div>
        </nav>
    </div>

    <!-- Content goes here -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
