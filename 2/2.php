<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .container{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Total Pembayaran</h1>
            <form action="" method="post" class="space-y-4">
                <div class="text-gray-600 mb-4">
                    <?php
                    echo "Hari ini hari : <b>" . date('l') . "</b>";
                    ?>
                </div>
                <div>
                    <label for="totalPembelanjaan" class="block text-gray-700 font-medium mb-2">Total Pembelanjaan :</label>
                    <input type="number" name="bayar" id="totalPembelanjaan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Hitung Pembelanjaan</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $totalPembelanjaan = $_POST['bayar'];

                function totalPembayaran($totalPembelanjaan)
                {
                    $hariIni = date('l');
                    $diskon = 0;

                    if ($hariIni === "Tuesday") {
                        $diskon += 0.05;
                    }

                    if ($totalPembelanjaan > 100000) {
                        $diskon += 0.07;
                    }

                    $totalDiskon = $diskon * $totalPembelanjaan;
                    $totalYangHarusDibayar = $totalPembelanjaan - $totalDiskon;

                    return $totalYangHarusDibayar;
                }

                $result = totalPembayaran($totalPembelanjaan);
                echo "<div class='mt-6 text-gray-800'>";
                echo "<p>Total pembelanjaan : <b>Rp. " . number_format($totalPembelanjaan, 0, ',', '.') . "</b></p>";
                echo "<p>Total yang harus dibayar : <b>Rp. " . number_format($result, 0, ',', '.') . "</b></p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>
