<?php
include '../koneksi.php'; 

// Eksekusi call procedure
mysqli_query($koneksi, "SET @totalAvailable = 0");
mysqli_query($koneksi, "CALL jumlah_mobil(@totalAvailable)");
$result = mysqli_query($koneksi, "SELECT @totalAvailable");

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalAvailable = $row['@totalAvailable'];
    // echo "Total Mobil Tersedia: " . $totalAvailable;
} else {
    echo "Gagal mendapatkan hasil dari prosedur.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
