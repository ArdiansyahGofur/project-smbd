<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
    <?php
    // Include koneksi.php
    include 'header.php';
    include '../koneksi.php';

    // Query untuk mengambil data dari view booking_view
    $sql = "SELECT * FROM booking_view ORDER BY tanggal_pinjam ASC";
    $result = $koneksi->query($sql);

    // Check if there are results and output data of each row
    if ($result !== false && $result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h2>Booking Data</h2>";
        echo "<table>";
        echo "<thead>"; 
        echo "<tr><th>No</th><th>ID Booking</th><th>Nama Penyewa</th><th>Merk Mobil</th><th>Tanggal Pinjam</th><th>Lama Sewa</th><th>Rencana Tanggal Kembali</th><th>Total Sewa</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        
        $counter = 1; // Inisialisasi nomor urut
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $counter++ . "</td>"; // Menampilkan nomor urut dan increment
            echo "<td>" . $row["id_booking"] . "</td>";
            echo "<td>" . $row["nama_penyewa"] . "</td>";
            echo "<td>" . $row["merk_mobil"] . "</td>";
            echo "<td>" . $row["tanggal_pinjam"] . "</td>";
            echo "<td>" . $row["lama_sewa"] . "</td>";
            echo "<td>" . $row["rencana_tanggal_kembali"] . "</td>";
            echo "<td>" . $row["total_sewa"] . "</td>";
            // echo "<td><a href='edit.php?id=" . $row["id_booking"] . "' class='edit-btn'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='container'>No data found</div>";
    }

    // Close connection
    $koneksi->close();
    ?>
</body>
</html>
