<?php
// Include koneksi.php
include '../koneksi.php';

// Pastikan id_mobil telah tersedia
if (isset($_POST['id_mobil'])) {
    // Ambil data yang dikirimkan melalui form
    $id_mobil = $_POST['id_mobil'];
    $no_plat = $_POST['no_plat'];
    $merk = $_POST['merk'];
    $tahun_mobil = $_POST['tahun_mobil'];
    $harga_sewa = $_POST['harga_sewa'];
    $status_mobil = $_POST['status_mobil'];

    // Cek apakah ada gambar yang diupload
    if ($_FILES['gambar']['name']) {
        // Proses upload gambar
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = "../images/" . $gambar; // Lokasi penyimpanan gambar, sesuaikan dengan folder yang diinginkan

        // Pindahkan gambar ke folder tujuan
        if (!move_uploaded_file($gambar_tmp, $gambar_path)) {
            echo "Error saat upload gambar.";
            exit();
        }
    } else {
        // Jika tidak ada gambar yang diupload, gunakan gambar yang sudah ada di database
        $sql_select = "SELECT gambar FROM mobil WHERE id_mobil = $id_mobil";
        $result_select = $koneksi->query($sql_select);
        $row_select = $result_select->fetch_assoc();
        $gambar = $row_select['gambar'];
    }

    // Query untuk menyimpan perubahan data ke database
    $sql = "UPDATE mobil SET no_plat = '$no_plat', merk = '$merk', tahun_mobil = '$tahun_mobil', harga_sewa = '$harga_sewa', status_mobil = '$status_mobil', gambar = '$gambar' WHERE id_mobil = $id_mobil";

    if ($koneksi->query($sql) === TRUE) {
        // Jika berhasil, redirect ke halaman daftar mobil
        header("Location: mobil.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    echo "ID mobil tidak tersedia.";
}

// Close connection
$koneksi->close();
?>
