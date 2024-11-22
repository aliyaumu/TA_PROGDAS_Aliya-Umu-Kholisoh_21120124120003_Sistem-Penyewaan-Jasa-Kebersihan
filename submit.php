<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #93bdde;
        }
        .detail {
            margin-bottom: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .detail:last-child {
            border-bottom: none;
        }
        .detail strong {
            display: block;
            margin-bottom: 5px;
        }
        .total {
            text-align: center;
            font-size: 1.5em;
            color: #333;
            margin-top: 20px;
        }
        .back-home-btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 18px;
            color: white;
            background: linear-gradient(45deg, #040569, #93bdde);
            text-decoration: none;
            border-radius: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }
        .back-home-btn:hover {
            background: linear-gradient(45deg, #93bdde, #2E7D32);
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }
        .back-home-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50px;
            width: 150%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-45deg);
            transition: all 0.5s ease-in-out;
            z-index: 0;
        }
        .back-home-btn:hover::before {
            left: 150%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pesanan</h1>
        <?php
        // Mengecek metode request
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mendapatkan data dari form
            $nama = isset($_POST['nama']) ? $_POST['nama'] : null;
            $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : null;
            $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
            $layanan = isset($_POST['layanan']) ? $_POST['layanan'] : null;
            $paket = isset($_POST['paket']) ? $_POST['paket'] : null;

            // Validasi input
            if (!$nama || !$telepon || !$alamat || !$layanan || !$paket) {
                echo "<p>Data tidak lengkap. Mohon isi semua field!</p>";
            } else {
                // Harga layanan
                $hargaLayanan = 0;
                switch ($layanan) {
                    case "rumah":
                        $hargaLayanan = 169000;
                        break;
                    case "kantor":
                        $hargaLayanan = 179000;
                        break;
                    case "kost":
                        $hargaLayanan = 99000;
                        break;
                }

                // Multiplier berdasarkan paket
                $multiplier = 1;
                switch ($paket) {
                    case "1 Ruangan":
                        $multiplier = 1;
                        break;
                    case "2-3 Ruangan":
                        $multiplier = 2;
                        break;
                    case "4-5 Ruangan":
                        $multiplier = 3;
                        break;
                }

                // Menghitung total harga
                $totalHarga = $hargaLayanan * $multiplier;

                // Menampilkan detail pesanan
                echo "<div class='detail'><strong>Nama:</strong> $nama</div>";
                echo "<div class='detail'><strong>Telepon:</strong> $telepon</div>";
                echo "<div class='detail'><strong>Alamat:</strong> $alamat</div>";
                echo "<div class='detail'><strong>Layanan:</strong> $layanan</div>";
                echo "<div class='detail'><strong>Paket:</strong> $paket</div>";
                echo "<div class='total'>Total Harga: Rp " . number_format($totalHarga, 0, ',', '.') . "</div>";
            }
        } else {
            echo "<p>Metode request tidak valid!</p>";
        }
        ?>
        <div style="text-align: center; margin-top: 20px;" >
            <a href="index.php" class="back-home-btn">Kembali ke Halaman Home</a>
        </div>
    </div>
</body>
</html>
