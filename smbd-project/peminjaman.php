<?php
// Include file koneksi.php
include 'koneksi.php';

// Tangkap nilai ID mobil dari parameter URL
$id_mobil = isset($_GET['id_mobil']) ? $_GET['id_mobil'] : '';

// Pastikan ID mobil tidak kosong
if (!$id_mobil) {
    // Jika ID mobil tidak ada, redirect ke halaman list mobil
    header("Location: list_mobil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/peminjaman.css">
    <title>Booking Form</title>
</head>
<body>
    <div class="container">
        <form action="proses_booking.php" method="post">
            <!-- Hidden input untuk id_mobil -->
            <input type="hidden" name="id_mobil" value="<?php echo htmlspecialchars($id_mobil); ?>">
            <label for="nik_penyewa">NIK Penyewa:</label><br>
            <input type="text" id="nik_penyewa" name="nik_penyewa" required><br>

            <label for="tanggal_pinjam">Tanggal Pinjam:</label><br>
            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required><br>

            <label for="lama_sewa">Lama Sewa (hari):</label><br>
            <input type="number" id="lama_sewa" name="lama_sewa" min="1" required><br>

            <input type="submit" value="Submit">
        </form>
        <button class="back-button" onclick="window.history.back()">Kembali</button>
    </div>
</body>
</html>
