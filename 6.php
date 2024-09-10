<?php 

$barang = [
    [
        'nama_barang' => 'Pasta Gigi',
        'harga_barang' => 18000,
        'jumlah_beli' => 1,
    ],
    [
        'nama_barang' => 'Sabun Mandi',
        'harga_barang' => 5000,
        'jumlah_beli' => 3,
    ],
    [
        'nama_barang' => 'Aloe Vera Sheet Mask',
        'harga_barang' => 15000,
        'jumlah_beli' => 4,
    ]
];

$no = 1;
$total_harga = 0;
echo "Daftar belanjaan :";

foreach ($barang as $br) {
    $nama_barang = $br['nama_barang'];
    $harga_barang = $br['harga_barang'];
    $jumlah_beli = $br['jumlah_beli'];
    $total_barang = $harga_barang * $jumlah_beli;
    $total_harga += $harga_barang * $jumlah_beli;

    echo " <br>";
    echo $no.". ".$nama_barang."($jumlah_beli)".": ". number_format($total_barang);
    $no++;
}

echo "<br>";
echo "Total harga yang harus dibayar adalah "."Rp ".number_format($total_harga);

?>