<?php 
        include '../koneksi.php';
        // Query untuk mengambil data dari view
        $query = "SELECT * FROM jumlah_mobil";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah query berhasil dieksekusi
        if (!$result) {
            echo "Error: " . mysqli_error($koneksi);
            exit();
        }

        // Ambil data dari hasil query
        $row = mysqli_fetch_assoc($result);

        // Ambil total pendapatan dari hasil query
        $jumlah_mobil = $row['total_mobil'];

        // Bebaskan hasil query
        mysqli_free_result($result);

        // Tutup koneksi
        mysqli_close($koneksi);
?>