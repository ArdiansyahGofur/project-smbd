<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mobil</title>
    <link rel="stylesheet" href="css/tambah_mobil.css">
</head>
<body>
    <div class="container">
        <h2>Form Input Mobil</h2>
        <form action="tambah_proses_mobil.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="no_plat">Nomor Plat:</label></td>
                    <td><input type="text" id="no_plat" name="no_plat" required></td>
                    <td rowspan="6" id="gambar-preview"></td> <!-- Kolom ke-3 untuk preview gambar -->
                </tr>
                <tr>
                    <td><label for="merk">Merk:</label></td>
                    <td><input type="text" id="merk" name="merk" required></td>
                </tr>
                <tr>
                    <td><label for="tahun_mobil">Tahun:</label></td>
                    <td><input type="number" id="tahun_mobil" name="tahun_mobil" required></td>
                </tr>
                <tr>
                    <td><label for="harga_sewa">Harga Sewa:</label></td>
                    <td><input type="number" id="harga_sewa" name="harga_sewa" required></td>
                </tr>
                <tr>
                    <td><label for="status_mobil">Status:</label></td>
                    <td>
                        <select id="status_mobil" name="status_mobil" required style="width: calc(100% - 12px);">
                            <option value="Tersedia">TERSEDIA</option>
                            <option value="Tidak Tersedia">TIDAK TERSEDIA</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="gambar">Gambar:</label></td>
                    <td><input type="file" id="gambar" name="gambar" accept="image/*" required></td>
                </tr>
            </table>

            <button type="submit">Submit</button>
            <button type="button" onclick="history.back()">Kembali</button>
        </form>
    </div>

    <script>
        // Fungsi untuk menampilkan preview gambar saat dipilih
        document.getElementById('gambar').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var img = document.createElement('img');
                img.src = dataURL;
                document.getElementById('gambar-preview').innerHTML = '';
                document.getElementById('gambar-preview').appendChild(img);
            };
            reader.readAsDataURL(input.files[0]);
        });
    </script>
</body>
</html>
