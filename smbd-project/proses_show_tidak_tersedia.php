<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e0f7fa; /* Light blue background */
        }
        .container {
            margin-top: 20px;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            text-align: center;
            color: #007bff;
        }
        .card-text {
            color: #333333;
            text-align: justify;
        }
        .back-button {
            margin-bottom: 20px;
        }
        .details-table {
            width: 100%;
            margin-bottom: 10px;
        }
        .details-table td {
            padding: 3px 0;
        }
        .details-table .label {
            width: 30%;
            font-weight: bold;
            color: #555;
        }
        .details-table .value {
            width: 70%;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="daftar_mobil.php" class="btn btn-secondary back-button">Kembali</a>
    <div class="row">
        <?php
        // Include koneksi.php
        include 'koneksi.php';

        // Query untuk mengambil data mobil
        $sql = "CALL tdk_tsd(@message)";
        $result = $koneksi->query($sql);

        if ($result) {
            // Bersihkan hasil sebelumnya
            while ($koneksi->next_result()) {
                if (!$koneksi->more_results()) break;
            }

            // Ambil pesan dari variabel sementara
            $sql_message = "SELECT @message AS message";
            $message_result = $koneksi->query($sql_message);
            $message_row = $message_result->fetch_assoc();
            $message = $message_row['message'];

            // Tampilkan pesan atau detail mobil yang tidak tersedia
            if ($message == 'Tidak ada mobil yang tidak tersedia.') {
                echo "<p>$message</p>";
            } else {
                // Ambil hasil dari prosedur tdk_tsd setelah menyelesaikan proses sebelumnya
                $result = $koneksi->query("SELECT id_mobil, no_plat, merk, tahun_mobil, harga_sewa, status_mobil, gambar FROM mobil WHERE status_mobil = 'Tidak Tersedia'");
                
                // Tampilkan hasilnya dalam bentuk card
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card'>";
                    echo "<img src='images/{$row['gambar']}' class='card-img-top' alt=''>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$row['merk']}</h5>";
                    echo "<table class='details-table'>";
                    echo "<tr><td class='label'>No. Plat:</td><td class='value'>{$row['no_plat']}</td></tr>";
                    echo "<tr><td class='label'>Tahun:</td><td class='value'>{$row['tahun_mobil']}</td></tr>";
                    echo "<tr><td class='label'>Harga Sewa:</td><td class='value'>Rp " . number_format($row["harga_sewa"]) . "</td></tr>";
                    echo "<tr><td class='label'>Status:</td><td class='value'>{$row['status_mobil']}</td></tr>";
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        } else {
            echo "Error: " . $koneksi->error;
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
