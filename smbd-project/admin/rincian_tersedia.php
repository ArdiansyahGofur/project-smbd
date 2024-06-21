<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/rincian_tersedia.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include '../koneksi.php'; ?>

    <div class="container">
        <table>
            <tr>
                <th>No Plat</th>
                <th>Merk</th>
                <th>Tahun Mobil</th>
                <th>Harga Sewa</th>
                <th>Status Mobil</th>
                <th>Gambar Mobil</th>
            </tr>
            <?php
            // Query untuk mengambil data dari view mobil_tersedia
            $query = "SELECT * FROM mobil_tersedia";
            $result = mysqli_query($koneksi, $query);

            // Tampilkan data dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['no_plat']."</td>";
                echo "<td>".$row['merk']."</td>";
                echo "<td>".$row['tahun_mobil']."</td>";
                echo "<td>Rp ".$row['harga_sewa']."</td>"; // Tambahkan format harga
                echo "<td>".$row['status_mobil']."</td>";
                echo "<td><img src='../images/".$row['gambar']."' class='gambar-mobil' alt='Gambar Mobil'></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
