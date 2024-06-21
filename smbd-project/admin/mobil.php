<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mobil.css">
</head>
<body>
    <?php include 'header.php'?>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <form method="GET" action="mobil.php" class="d-flex justify-content-end">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari berdasarkan nomor plat, merk, atau tahun">
                    <select name="status" class="form-select me-2">
                        <option value="">Semua Status</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                    </select>
                    <button type="submit" class="btn btn-outline-success">Cari</button>
                </form>
            </div>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No Plat</th>
                    <th>Merk</th>
                    <th>Tahun Mobil</th>
                    <th>Harga Sewa</th>
                    <th>Status Mobil</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include koneksi.php
                include '../koneksi.php';

                // SQL query to select data with search functionality
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $status = isset($_GET['status']) ? $_GET['status'] : '';
                $searchUpper = strtoupper($search);

                $sql = "SELECT * FROM mobil WHERE (UPPER(no_plat) LIKE '%$searchUpper%' OR UPPER(merk) LIKE '%$searchUpper%' OR UPPER(tahun_mobil) LIKE '%$searchUpper%')";
                if ($status) {
                    $sql .= " AND status_mobil = '$status'";
                }

                $result = $koneksi->query($sql);

                // Nomor urut
                $counter = 1;

                // Check if there are results and output data of each row
                if ($result !== false && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $counter++ . "</td>
                                <td>" . $row["no_plat"]. "</td>
                                <td>" . $row["merk"]. "</td>
                                <td>" . $row["tahun_mobil"]. "</td>
                                <td>" . $row["harga_sewa"]. "</td>
                                <td>" . $row["status_mobil"]. "</td>
                                <td><img src='../images/" . $row["gambar"] . "' width='100'></td>
                                <td>
                                    <a href='edit_mobil.php?id=" . $row["id_mobil"] . "' class='btn btn-primary btn-sm'>Edit</a>
                                    <a href='hapus_mobil.php?id=" . $row["id_mobil"] . "' class='btn btn-danger btn-sm'>Hapus</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Data Tidak Ada</td></tr>";
                }

                // Close connection
                $koneksi->close();
                ?>
            </tbody>
        </table>

        <!-- Tombol Tambah Mobil -->
        <a href="tambah_mobil.php" class="btn btn-success">Tambah Mobil</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
