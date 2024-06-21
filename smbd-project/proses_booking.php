<?php
// Include file koneksi.php
include 'koneksi.php';

// Tangkap nilai dari formulir
$nik_penyewa = $_POST['nik_penyewa'];
$id_mobil = $_POST['id_mobil'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$lama_sewa = $_POST['lama_sewa'];

// Fungsi untuk memanggil prosedur bookingAndPenggembalian
function callBookingAndPenggembalian($nik_penyewa, $id_mobil, $tanggal_pinjam, $lama_sewa) {
    global $koneksi;

    try {
        // Prepare statement untuk memanggil prosedur
        $stmt = $koneksi->prepare("CALL bookingAndPenggembalian(?, ?, ?, ?)");

        // Bind parameter ke statement
        $stmt->bind_param("siss", $nik_penyewa, $id_mobil, $tanggal_pinjam, $lama_sewa);

        // Eksekusi statement
        $stmt->execute();

        // Tutup statement
        $stmt->close();
    } catch (Exception $e) {
        // Tampilkan pesan error menggunakan JavaScript
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'sewa.php';</script>";
        exit(); // Hentikan eksekusi lebih lanjut
    }
}

// Panggil fungsi dengan nilai yang diterima dari formulir
callBookingAndPenggembalian($nik_penyewa, $id_mobil, $tanggal_pinjam, $lama_sewa);

// Redirect ke halaman total.php setelah prosedur dipanggil
echo "<script>alert('Data berhasil ditambahkan');window.location.href = 'total.php';</script>";
// header("Location: total.php");
exit();
?>
