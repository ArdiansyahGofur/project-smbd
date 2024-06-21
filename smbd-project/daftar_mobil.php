<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/daftar_mobil.css">
</head>
<body>

<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <a href="index.php" class="btn btn-secondary back-button">Kembali</a>
        </div>
        <div class="col-md-6 text-right">
            <div class="btn-group filter-buttons" role="group">
                <a href="daftar_mobil.php" class="btn btn-primary">Semua</a>
                <a href="proses_show_tersedia.php" class="btn btn-success">Tersedia</a>
                <a href="proses_show_tidak_tersedia.php" class="btn btn-danger">Tidak Tersedia</a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        // Include koneksi.php
        include 'koneksi.php';

        // Inisialisasi filter
        $filter = isset($_GET['status']) ? $_GET['status'] : '';

        // Query untuk mengambil data mobil sesuai filter
        if ($filter && ($filter === 'Tersedia' || $filter === 'Tidak Tersedia')) {
            $sql = "SELECT * FROM mobil WHERE status_mobil = '$filter'";
        } else {
            $sql = "SELECT * FROM mobil";
        }
        
        $result = $koneksi->query($sql);

        // Check if there are results and output data of each row
        if ($result !== false && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="images/<?php echo $row["gambar"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["merk"]; ?></h5>
                    <table class="details-table">
                        <tr>
                            <td class="label">No. Plat</td>
                            <td class="value"><?php echo $row["no_plat"]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Tahun</td>
                            <td class="value"><?php echo $row["tahun_mobil"]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Harga Sewa</td>
                            <td class="value">Rp <?php echo number_format($row["harga_sewa"]); ?></td>
                        </tr>
                        <tr>
                            <td class="label">Status</td>
                            <td class="value"><?php echo $row["status_mobil"]; ?></td>
                        </tr>
                    </table>
                    <?php if ($row["status_mobil"] === "TERSEDIA") { ?>
                        <a href="peminjaman.php?id_mobil=<?php echo $row['id_mobil']; ?>" class="btn btn-primary">Sewa</a>
                    <?php } else { ?>
                        <button class="btn btn-secondary" disabled>TIDAK TERSEDIA</button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p>No mobil data available</p>";
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
