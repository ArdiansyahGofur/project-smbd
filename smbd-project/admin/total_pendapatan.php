<?php 
include '../koneksi.php';

// Query untuk mengambil data dari view
$query = "SELECT * FROM total_pendapatan";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

// Ambil data dari hasil query
$row = mysqli_fetch_assoc($result);

// Ambil total pendapatan dari hasil query
$totalPendapatan = $row['total_pendapatan'];

// Format total pendapatan
$totalPendapatanFormatted = number_format($totalPendapatan);

// Bebaskan hasil query
mysqli_free_result($result);

// Tutup koneksi
mysqli_close($koneksi);
?>
