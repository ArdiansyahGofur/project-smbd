<?php
include "../koneksi.php";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $no_plat = $_POST["no_plat"];
        $merk = $_POST["merk"];
        $tahun_mobil = $_POST["tahun_mobil"];
        $harga_sewa = $_POST["harga_sewa"];
        $status_mobil = $_POST["status_mobil"];

        // Proses upload gambar
        $gambar = $_FILES["gambar"]["name"];
        $temp = $_FILES["gambar"]["tmp_name"];

        // Ganti folder tujuan dengan path yang benar
        $folder = "../images/"; // Sesuaikan dengan struktur folder yang benar

        // Pindahkan gambar ke folder uploads
        if (move_uploaded_file($temp, $folder . $gambar)) {
            $query = "INSERT INTO mobil (no_plat, merk, tahun_mobil, harga_sewa, status_mobil, gambar) 
                      VALUES ('$no_plat', '$merk', '$tahun_mobil', '$harga_sewa', '$status_mobil', '$gambar')";

            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Data berhasil diinput'); window.location.href = 'mobil.php';</script>";
                exit; // Keluar dari script setelah melakukan redirect
            } else {
                echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.');</script>";
            }
        } else {
            echo "<script>alert('Upload gambar gagal.');</script>";
        }
    } else {
        header("Location: home.php");
    }
} catch (Exception $e) {
    // Tangkap kesalahan dan tampilkan pesan error menggunakan JavaScript
    echo "<script>alert('Kesalahan: " . $e->getMessage() . "'); window.location.href = 'mobil.php';</script>";
}
?>
