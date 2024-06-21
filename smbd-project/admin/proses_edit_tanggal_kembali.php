<?php
// Include koneksi.php
include '../koneksi.php';

try {
    // Tangkap data dari form
    $id_pengembalian = $_POST['id_pengembalian'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Panggil stored procedure untuk mengupdate tanggal kembali
    $stmt = $koneksi->prepare("CALL update_pengembalian(?, ?)");
    $stmt->bind_param("is", $id_pengembalian, $tanggal_kembali);

    // Execute statement
    if ($stmt->execute()) {
        // Redirect ke halaman data pengembalian
        header("Location: pengembalian.php");
        exit();
    } else {
        echo "Error updating record: " . $koneksi->error;
    }

    // Close statement and connection
    $stmt->close();
    $koneksi->close();
} catch (Exception $e) {
    // Tampilkan pesan error menggunakan JavaScript
    echo "<script>alert('Kesalahan: " . $e->getMessage() . "'); window.location.href = 'pengembalian.php';</script>";
}
?>
