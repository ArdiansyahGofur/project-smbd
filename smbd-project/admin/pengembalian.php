<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pengembalian.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Data Pengembalian</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Booking</th>
                    <th>Nama Penyewa</th>
                    <th>Merk Mobil</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include koneksi.php
                include '../koneksi.php';

                // Query untuk mengambil data dari view pengembalian_detail
                $sql = "SELECT * FROM pengembalian_detail ORDER BY tanggal_pinjam ASC";
                $result = $koneksi->query($sql);

                // Check if there are results and output data of each row
                if ($result->num_rows > 0) {
                    $no = 1; // Inisialisasi nomor urut
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $row["id_booking"] . "</td>
                                <td>" . $row["nama_penyewa"] . "</td>
                                <td>" . $row["merk"] . "</td>
                                <td>" . $row["tanggal_pinjam"] . "</td>
                                <td>" . $row["tanggal_kembali"] . "</td>
                                <td>" . $row["denda"] . "</td>
                                <td>
                                    <a href='edit_pengembalian.php?id=" . $row["id_pengembalian"] . "' class='edit-btn'>Edit</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }

                // Close connection
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
