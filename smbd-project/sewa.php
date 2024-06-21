<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sewa.css">
    <title>Form Pengisian Data</title>
</head>
<body>
    <h2>Form Pengisian Data</h2>
    <form action="proses_pengisian.php" method="POST">
        <label for="nama_penyewa">Nama Penyewa:</label><br>
        <input type="text" id="nama_penyewa" name="nama_penyewa" required><br>

        <label for="nik_penyewa">NIK Penyewa:</label><br>
        <input type="text" id="nik_penyewa" name="nik_penyewa" required><br>

        <label for="tlp_penyewa">Telepon Penyewa:</label><br>
        <input type="text" id="tlp_penyewa" name="tlp_penyewa" required><br>

        <label for="alamat_penyewa">Alamat Penyewa:</label><br>
        <input type="text" id="alamat_penyewa" name="alamat_penyewa" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br>

        <button type="submit">Submit</button>
    </form>
    <div class="button-container">
        <button type="button" onclick="window.history.back();">Kembali</button>
    </div>
</body>
</html>
