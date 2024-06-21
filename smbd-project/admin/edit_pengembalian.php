<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tanggal Kembali Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit_pengembalian.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Edit Tanggal Kembali Pengembalian</h2>
        <?php
        // Include koneksi.php
        include '../koneksi.php';

        // Tangkap ID pengembalian dari URL
        $id_pengembalian = $_GET['id'];

        // Query untuk mengambil data pengembalian berdasarkan ID
        $sql = "SELECT * FROM pengembalian WHERE id_pengembalian = $id_pengembalian";
        $result = $koneksi->query($sql);

        // Check if there are results and output data of each row
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
        <form action="proses_edit_tanggal_kembali.php" method="POST">
            <input type="hidden" name="id_pengembalian" value="<?php echo $row['id_pengembalian']; ?>">
            <div class="mb-3">
                <label for="id_booking" class="form-label">ID Booking</label>
                <input type="text" class="form-control" id="id_booking" name="id_booking" value="<?php echo $row['id_booking']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="no_plat" class="form-label">Nomor Plat</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" value="<?php echo $row['no_plat']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="text" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo $row['tanggal_pinjam']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo $row['tanggal_kembali']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
        <a href="pengembalian.php" class="btn btn-secondary mt-3">Kembali</a>
        <?php
        } else {
            echo "<p>Data not found</p>";
        }

        // Close connection
        $koneksi->close();
        ?>
    </div>
</body>
</html>
