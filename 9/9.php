<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Koin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Cari Jenis Koin</h2>
            <form action="" method="post" class="space-y-4">
                <div>
                    <label for="uang" class="block text-sm font-medium text-gray-700">Uang (RP):</label>
                    <input type="number" name="jumlah" id="uang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cari</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $jumlah = $_POST['jumlah'];

                function cariJenisKoin($jumlah)
                {
                    // Daftar koin yang tersedia dalam urutan dari nilai tertinggi ke terendah
                    $koin = [500, 200, 100];
                    $hasil = [];

                    // Iterasi melalui setiap jenis koin
                    foreach ($koin as $nilai) {
                        // Jika jumlah masih bisa dibagi dengan nilai koin saat ini
                        if ($jumlah >= $nilai) {
                            // Tambahkan nilai koin ke hasil
                            $hasil[] = $nilai;
                            // Kurangi jumlah uang yang tersisa
                            $jumlah -= intdiv($jumlah, $nilai) * $nilai;
                        }
                    }

                    return $hasil;
                }
            ?>

            <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                <?php
                $jenisKoin = cariJenisKoin($jumlah);
                echo "<h3 class='text-xl font-semibold text-center mb-4'>Jenis Koin untuk Uang Rp. $jumlah:</h3>";
                echo "<ul class='space-y-2'>";
                foreach ($jenisKoin as $nilai) {
                    echo "<li class='text-center text-lg text-gray-800'>Rp. $nilai</li>";
                }
                echo "</ul>";
                ?>
            </div>

            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>