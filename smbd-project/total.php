<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/total.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <?php
            // Include koneksi.php
            include 'koneksi.php';

            // Query untuk mengambil data dari view booking_view
            $sql = "SELECT * FROM booking_view ORDER BY id_booking DESC LIMIT 1";
            $result = $koneksi->query($sql);

            // Check if there are results and output data of each row
            if ($result !== false && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
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
                        <!-- Button untuk kembali ke index -->
                        <!-- <a href="index.php" class="btn btn-primary btn-block">Kembali</a> -->
                        <!-- Button untuk mencetak -->
                        <a href="cetak.php?id=<?php echo $row["id_booking"]; ?>" class="btn btn-print btn-block">Cetak</a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p class='col'>No booking data available</p>";
            }

            // Close connection
            $koneksi->close();
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
