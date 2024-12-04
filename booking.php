<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYA CLEAN - Harga Paket Layanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="image/logo.png" alt="Logo AYA CLEAN">
            </div>
            <nav class="navigasi">
                <a href="index.php" class="nav">Home</a>
                <a href="#booking" class="nav">Booking</a>
            </nav>
        </div>
    </header>

    <?php
    // class getter dan setter
    class Layanan {
        private $title;
        private $price;
        private $link;

        public function __construct($title, $price, $link) {
            $this->title = $title;
            $this->price = $price;
            $this->link = $link;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getLink() {
            return $this->link;
        }

        public function formatPrice() {
            return "Rp " . number_format($this->price, 0, ',', '.');
        }
    }

    // Array
    $layananList = [
        new Layanan("Bersih Harian Rumah", 169000, "form.php?service=rumah"),
        new Layanan("Bersih Harian Kantor", 179000, "form.php?service=kantor"),
        new Layanan("Bersih Harian Kost", 99000, "form.php?service=kost")
    ];
    ?>

    <section id="booking" class="pricing">
        <h2>Harga Paket Layanan AYA CLEAN</h2>
        <p>Dengan harga paket yang terjangkau, Anda sudah dapat layanan maksimal.</p>
        <div class="pricing-cards">
            <?php foreach ($layananList as $layanan): ?>
                <div class="card">
                    <h3><?= $layanan->getTitle() ?></h3>
                    <p>Harga mulai</p>
                    <h2><?= $layanan->formatPrice() ?> <span>Ribu</span></h2>
                    <ul>
                        <li>Sedia Paket Custom</li>
                    </ul>
                    <a href="<?= $layanan->getLink() ?>" class="btn">Booking Now</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
