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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <?php include 'header.php'?>
</body>
</html>
