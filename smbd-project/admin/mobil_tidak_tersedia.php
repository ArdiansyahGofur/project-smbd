<?php
include '../koneksi.php'; 

// Eksekusi call procedure
mysqli_query($koneksi, "SET @total = 0");
mysqli_query($koneksi, "CALL jumlah_mobil_tidak(@total)");
$result = mysqli_query($koneksi, "SELECT @total");

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total = $row['@total'];
    // echo "Total Mobil Tersedia: " . $total;
} else {
    echo "Gagal mendapatkan hasil dari prosedur.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
