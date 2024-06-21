
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <?php include 'mobil_tersedia.php'; ?>

    <?php include 'mobil_tidak_tersedia.php'; ?>

    <?php include 'total_pendapatan.php' ; ?>

    <?php include 'jumlah_penyewa_booking.php' ; ?>

    <?php include 'jumlah_mobil_belum_kembali.php' ;?>

    <?php include 'jumlah_mobil.php' ;?>

    
    <div class="dashboard">
        <div class="card">
            <h2>Mobil Tersedia</h2>
            <h1><?php echo $totalAvailable; ?></h1>
            <div class="details">
                <p><a href="rincian_tersedia.php">Lihat Rincian</a></p>
            </div>
        </div>
        <div class="card">
            <h2>Mobil Tidak Tersedia</h2>
            <h1><?php echo $total; ?></h1>
            <div class="details">
                <p><a href="rincian_tidak_tersedia.php">Lihat Rincian</a></p>
            </div>
        </div>
        <div class="card">
            <h2>Jumlah Mobil</h2>
            <br><br>
            <h1><?php echo $jumlah_mobil; ?></h1>
        </div>
        <div class="card">
            <h2>Jumlah Penyewa</h2>
            <h1><?php echo $jumlah_penyewa; ?></h1>
        </div>
        <div class="card">
            <h2>Jumlah Mobil Belum Dikembalikan</h2>
            <h1><?php echo $jumlah_mobil_belum_dikembalikan; ?></h1>
        </div>
        <div class="card">
            <h2>Total Pendapatan</h2>
            <h1>Rp <?php echo $totalPendapatanFormatted; ?></h1>
        </div>
    </div>
</body>
</html>
