<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Form Pemesanan</h2>
        <form action="submit.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
            
            <label for="telepon">Nomor Telepon:</label>
            <input type="text" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon" required pattern="[0-9]+" title="Hanya angka diperbolehkan">
            
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
            
            <label for="layanan">Pilih Layanan:</label>
            <select id="layanan" name="layanan" required>
                <option disabled selected value="">Pilih Layanan</option>
            </select>

            <label for="paket">Pilih Paket:</label>
            <select id="paket" name="paket" required>
                <option disabled selected value="">Pilih Paket</option>
            </select>
            
            <button type="submit" class="btn">Kirim Pesanan</button>
        </form>
    </div>

    <script>
        // Class setter and getter
        class FormDataHandler {
            constructor(nama, telepon, alamat, layanan, paket) {
                this._nama = nama;
                this._telepon = telepon;
                this._alamat = alamat;
                this._layanan = layanan;
                this._paket = paket;
            }

            set nama(value) {
                this._nama = value;
            }

            get nama() {
                return this._nama;
            }

            set telepon(value) {
                this._telepon = value;
            }

            get telepon() {
                return this._telepon;
            }

            set alamat(value) {
                this._alamat = value;
            }

            get alamat() {
                return this._alamat;
            }

            set layanan(value) {
                this._layanan = value;
            }

            get layanan() {
                return this._layanan;
            }

            set paket(value) {
                this._paket = value;
            }

            get paket() {
                return this._paket;
            }
        }

        const layananOptions = [
            { value: "rumah", text: "Rumah", harga: 169000 },
            { value: "kantor", text: "Kantor", harga: 179000 },
            { value: "kost", text: "Kost", harga: 99000 }
        ];

        const paketOptions = [
            { value: "1 Ruangan", text: "1 Ruangan", multiplier: 1 },
            { value: "2-3 Ruangan", text: "2-3 Ruangan", multiplier: 2 },
            { value: "4-5 Ruangan", text: "4-5 Ruangan", multiplier: 3 }
        ];

        const layananDropdown = document.getElementById('layanan');
        for (let i = 0; i < layananOptions.length; i++) {
            const option = document.createElement('option');
            option.value = layananOptions[i].value;
            option.textContent = layananOptions[i].text;
            option.dataset.harga = layananOptions[i].harga;
            layananDropdown.appendChild(option);
        }

        const paketDropdown = document.getElementById('paket');
        for (let i = 0; i < paketOptions.length; i++) {
            const option = document.createElement('option');
            option.value = paketOptions[i].value;
            option.textContent = paketOptions[i].text;
            option.dataset.multiplier = paketOptions[i].multiplier;
            paketDropdown.appendChild(option);
        }

    </script>
</body>
</html>
