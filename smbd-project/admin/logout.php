<?php
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login atau halaman lain sesuai kebutuhan
header("Location: ../index.php");
exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
?>
