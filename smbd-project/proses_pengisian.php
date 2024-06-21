<?php
// Include file koneksi.php
include 'koneksi.php';

// Tangkap data yang dikirimkan dari formulir
$nama_penyewa = $_POST['nama_penyewa'];
$nik_penyewa = $_POST['nik_penyewa'];
$tlp_penyewa = $_POST['tlp_penyewa'];
$alamat_penyewa = $_POST['alamat_penyewa'];
$jenis_kelamin = $_POST['jenis_kelamin'];

try {
    // Buat query untuk menyimpan data ke dalam tabel penyewa
    $sql = "INSERT INTO penyewa (nama_penyewa, nik_penyewa, tlp_penyewa, alamat_penyewa, jenis_kelamin)
            VALUES ('$nama_penyewa', '$nik_penyewa', '$tlp_penyewa', '$alamat_penyewa', '$jenis_kelamin')";

    // Jalankan query
    if ($koneksi->query($sql) === TRUE) {
        // Jika berhasil, redirect ke halaman daftar_mobil.php
        echo "<script>alert('Data berhasil ditambahkan');window.location.href = 'daftar_mobil.php';</script>";
        // header("Location: daftar_mobil.php");
        exit();
    } else {
        throw new Exception($koneksi->error);
    }
} catch (Exception $e) {
    // Tampilkan pesan error menggunakan JavaScript
    echo "<script>alert('Kesalahan: " . $e->getMessage() . "'); window.location.href = 'sewa.php';</script>";
}

// Tutup koneksi
$koneksi->close();
?>
