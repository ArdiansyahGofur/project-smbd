<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// // Halaman sukses
// echo "Welcome, " . $_SESSION['username'] . "! You are now logged in.";
// ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #dc3545; /* Warna latar belakang navbar merah */
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white; /* Warna teks navbar-brand */
        }
        .navbar-nav .nav-link {
            font-size: 1rem; /* Ukuran teks */
            font-weight: 500; /* Ketebalan teks */
            transition: background-color 0.3s ease-in-out;
            margin: 0 10px; /* Jarak antar link */
            border-radius: 5px;
            padding: 10px 15px; /* Padding agar link lebih besar area kliknya */
            display: inline-block;
            color: white; /* Warna teks navbar link */
        }
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Warna latar belakang saat dihover */
        }
        .navbar-toggler {
            border: none;
            background-color: transparent !important; /* Menghilangkan warna latar belakang tombol toggler */
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%288%2C 8%2C 8%2C 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        /* Memberikan hover effect pada tombol toggler */
        .navbar-toggler:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        /* Style untuk link active */
        .navbar-nav .nav-item .nav-link {
            color: white; /* Warna teks saat link tidak aktif */
        }
        .navbar-nav .nav-item.active .nav-link,
        .navbar-nav .nav-item .nav-link:active {
            color: #ffdd57; /* Warna teks saat link aktif */
            background-color: rgba(255, 255, 255, 0.1); /* Memberikan highlight */
            display: block; /* Mengubah display menjadi block saat link aktif */
        }
        /* Style untuk pesan Welcome */
        .navbar-text {
            font-size: 1rem;
            font-weight: bold;
            color: white;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body> 
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Home</a>
            <div class="navbar-text">Selamat Datang  <?php echo $_SESSION['username']; ?></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Menggunakan ms-auto untuk menggeser menu ke kanan -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="mobil.php">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="penyewa.php">Daftar Penyewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Daftar Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengembalian.php">Daftar Pengembalian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content goes here -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
