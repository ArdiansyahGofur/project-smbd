<?php
// Include file koneksi.php
include '../koneksi.php';

// Query untuk mengambil data penyewa
$sql = "SELECT * FROM penyewa";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewa</title>
    <link rel="stylesheet" href="css/penyewa.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Data Penyewa</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>NIK</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are results and output data of each row
                if ($result !== false && $result->num_rows > 0) {
                    $no = 1; // Inisialisasi nomor urutan
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>"; // Menampilkan nomor urutan dan increment
                        echo "<td>" . $row["nama_penyewa"] . "</td>";
                        echo "<td>" . $row["nik_penyewa"] . "</td>";
                        echo "<td>" . $row["tlp_penyewa"] . "</td>";
                        echo "<td>" . $row["alamat_penyewa"] . "</td>";
                        echo "<td>" . $row["jenis_kelamin"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
