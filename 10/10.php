<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Jawaban Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header text-center text-black">
                <h2>Cek Jawaban Siswa</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namaSiswa" class="form-label">Nama Siswa:</label>
                        <input type="text" class="form-control" name="namaSiswa" id="namaSiswa" required>
                    </div>

                    <div class="jawaban-siswa">
                        <?php
                        // Buat array untuk opsi jawaban
                        $pilihanJawaban = ['A', 'B', 'C', 'D', 'E'];

                        // Buat 10 elemen select menggunakan perulangan
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<div class='mb-3'>";
                            echo "<label for='soal{$i}' class='form-label'>Soal {$i}: </label>";
                            echo "<select class='form-select' name='soal{$i}' id='soal{$i}' required>";
                            echo "<option value='' disabled hidden selected>Pilih Jawaban</option>";

                            // Looping untuk pilihan jawaban
                            foreach ($pilihanJawaban as $jawaban) {
                                echo "<option value='{$jawaban}'>{$jawaban}</option>";
                            }

                            echo "</select>";
                            echo "</div>";
                        }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cek Jawaban</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Ambil nama siswa
            $namaSiswa = $_POST['namaSiswa'];

            // Ambil jawaban siswa dari form (soal1 sampai soal10)
            $jawabanSiswa = [];
            for ($i = 1; $i <= 10; $i++) {
                if (isset($_POST["soal{$i}"])) {
                    $jawabanSiswa[] = $_POST["soal{$i}"];
                }
            }

            // Cek apakah semua soal sudah diisi
            if (count($jawabanSiswa) < 10) {
                echo "<div class='alert alert-danger mt-3'>Harap isi semua jawaban soal!</div>";
            } else {
                // Fungsi untuk mengecek jawaban siswa
                function cekJawaban($namaSiswa, $jawabanSiswa)
                {
                    // Jawaban yang benar
                    $jawabanBenar = ['A', 'D', 'C', 'C', 'B', 'A', 'E', 'B', 'A', 'E'];

                    // Hitung jumlah jawaban yang benar dan salah
                    $jumlahBenar = 0;
                    $jumlahSalah = 0;
                    foreach ($jawabanSiswa as $index => $jawaban) {
                        if ($jawaban === $jawabanBenar[$index]) {
                            $jumlahBenar++;
                        } else {
                            $jumlahSalah++;
                        }
                    }

                    // Tampilkan hasil
                    echo "<div class='mt-4 text-center'>";
                    echo "<h2 class='text-center'>Hasil Jawaban</h2>";
                    echo "<div class='alert alert-info'>";
                    echo "Nama: <strong>$namaSiswa</strong><br>";
                    echo "Jumlah Jawaban Benar: <strong>$jumlahBenar</strong><br>";
                    echo "Jumlah Jawaban Salah: <strong>$jumlahSalah</strong>";
                    echo "</div>";
                    echo "</div>";
                }

                // Panggil fungsi cek jawaban
                cekJawaban($namaSiswa, $jawabanSiswa);
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>