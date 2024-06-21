<?php
// Include koneksi.php
include '../koneksi.php';

// Cek apakah parameter 'id' terdefinisi dan merupakan bilangan bulat
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Ambil ID mobil dari URL
    $id = $_GET['id'];

    // Mulai transaksi
    $koneksi->begin_transaction();

    try {
        // Query untuk menghapus data mobil berdasarkan ID
        $sql = "DELETE FROM mobil WHERE id_mobil = $id";
        $koneksi->query($sql);

        // Komit transaksi
        $koneksi->commit();

        // Redirect kembali ke halaman mobil.php
        header("Location: mobil.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        // Rollback transaksi jika ada kesalahan
        $koneksi->rollback();

        // Tampilkan pesan kesalahan menggunakan alert
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'mobil.php';</script>";
    }
} else {
    echo "ID mobil tidak valid.";
}

// Close connection
$koneksi->close();
?>
