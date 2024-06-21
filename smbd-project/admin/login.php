<?php
// Mulai session
session_start();

// Array of users (username => password)
$users = array(
    "admin" => "admin",
    "user1" => "admin"
);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists and password matches
    if (array_key_exists($username, $users) && $users[$username] == $password) {
        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to a protected page
        echo "<script>alert('Login Berhasil'); window.location.href = 'home.php';</script>";
        // header("Location: home.php");
        exit();
    } else {
        // Display an error message
        echo "<script>alert('Username atau password salah'); window.location.href = 'index.php';</script>";
    }
} else {
    // If the form is not submitted, redirect to login page
    header("Location: index.php");
    exit();
}
?>
