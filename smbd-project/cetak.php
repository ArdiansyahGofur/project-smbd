<?php
// Include koneksi.php
include 'koneksi.php';

// Ambil ID booking dari parameter URL
if(isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    // Query untuk mengambil data booking berdasarkan ID
    $sql = "SELECT * FROM booking_view WHERE id_booking = $booking_id";
    $result = $koneksi->query($sql);

    // Check if there are results and output data of each row
    if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Card - Cetak</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cetak.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-title">Booking ID: <?php echo $row["id_booking"]; ?></h5>
                <table class="table table-light">
                    <tr>
                        <th>Nama Penyewa</th>
                        <td><?php echo $row["nama_penyewa"]; ?></td>
                    </tr>
                    <tr>
                        <th>Merk Mobil</th>
                        <td><?php echo $row["merk_mobil"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <td><?php echo $row["tanggal_pinjam"]; ?></td>
                    </tr>
                    <tr>
                        <th>Lama Sewa</th>
                        <td><?php echo $row["lama_sewa"]; ?> hari</td>
                    </tr>
                    <tr>
                        <th>Rencana Tanggal Kembali</th>
                        <td><?php echo $row["rencana_tanggal_kembali"]; ?></td>
                    </tr>
                    <tr>
                        <th>Total Sewa</th>
                        <td>Rp <?php echo number_format($row["total_sewa"]); ?></td>
                    </tr>
                </table>
            </div>
            <div class="button-group">
                <button class="btn btn-primary btn-cetak" onclick="window.print()">Cetak</button>
                <a href="index.php" class="btn btn-secondary btn-back mt-2">Kembali</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
        }
    } else {
        echo "<p>No booking data available</p>";
    }

    // Close connection
    $koneksi->close();
} else {
    echo "<p>No booking ID specified</p>";
}
?>
