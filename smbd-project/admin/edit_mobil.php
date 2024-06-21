<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Include koneksi.php
include '../koneksi.php';

// Cek apakah parameter 'id' telah diset
if(isset($_GET['id'])) {
    // Ambil ID mobil dari URL
    $id = $_GET['id'];

    // Query untuk mengambil data mobil berdasarkan ID
    $sql = "SELECT * FROM mobil WHERE id_mobil = $id";
    $result = $koneksi->query($sql);

    // Cek jika data ditemukan
    if ($result && $result->num_rows > 0) {
        // Ambil data mobil
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mobil</title>
    <link rel="stylesheet" href="css/tambah_mobil.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Mobil</h2>
        <form action="edit_proses_mobil.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="no_plat">Nomor Plat:</label></td>
                    <input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil']; ?>">
                    <td><input type="text" id="no_plat" name="no_plat" value="<?php echo $row['no_plat']; ?>" required></td>
                    <td rowspan="6" id="gambar-preview">
                        <?php
                        // Tampilkan gambar mobil
                        if (!empty($row['gambar'])) {
                            echo '<img src="'.$row['gambar'].'" alt="Gambar Mobil">';
                        } else {
                            echo '<img src="gambar_mobil_default.jpg" alt="Gambar Mobil">';
                        }
                        ?>
                    </td> <!-- Kolom ke-3 untuk preview gambar -->
                </tr>
                <tr>
                    <td><label for="merk">Merk:</label></td>
                    <td><input type="text" id="merk" name="merk" value="<?php echo $row['merk']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="tahun_mobil">Tahun:</label></td>
                    <td><input type="number" id="tahun_mobil" name="tahun_mobil" value="<?php echo $row['tahun_mobil']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="harga_sewa">Harga Sewa:</label></td>
                    <td><input type="number" id="harga_sewa" name="harga_sewa" value="<?php echo $row['harga_sewa']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="status_mobil">Status:</label></td>
                    <td>
                        <select id="status_mobil" name="status_mobil" required style="width: calc(100% - 12px);">
                            <option value="Tersedia" <?php if($row['status_mobil'] == 'TERSEDIA') echo 'selected'; ?>>TERSEDIA</option>
                            <option value="Tidak Tersedia" <?php if($row['status_mobil'] == 'TIDAK TERSEDIA') echo 'selected'; ?>>TIDAK TERSEDIA</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="gambar">Gambar:</label></td>
                    <td><input type="file" id="gambar" name="gambar" accept="image/*"></td>
                </tr>
            </table>

            <button type="submit">Update</button>
            <button type="button" onclick="window.history.back()">Kembali</button>
        </form>
    </div>

    <script>
        // JavaScript here
    </script>
</body>
</html>
<?php
    } else {
        echo "Data mobil tidak ditemukan.";
    }
} else {
    echo "ID mobil tidak ditemukan.";
}
?>
