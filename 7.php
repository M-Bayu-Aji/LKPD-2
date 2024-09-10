<?php 

function formatTeks($text, $maxLength = 50) {
    if (strlen($text) > $maxLength) {
        return substr($text, 0, $maxLength).'...';
    }
    return $text;
}

$teks = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nesciunt similique labore quidem. Unde, blanditiis esse minima vero nesciunt obcaecati. Minima doloribus molestias sequi earum ab. Cupiditate, perferendis amet! Autem accusantium totam ea dignissimos harum reprehenderit, laudantium fugit? Numquam maiores nemo voluptatum porro illo adipisci ipsam error provident in venia ajhdfka wierjknkjffdlk";
$hasil = formatTeks($teks);
echo "<b>Kalimat : </b>"."$hasil";

?>