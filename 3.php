<?php 

for($i = 1; $i <= 30; $i++) {
    $bagi = 90;
    $hasil = $bagi / $i;
    if($bagi % $i == 0) {
        echo $bagi. " : ".$i. " = ".$hasil. "<br>";
    }
}

?>