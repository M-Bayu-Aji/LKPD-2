<?php

$jurusan = [
    "PPLG",
    'HTL',
    'KLN',
    'PMN',
    'pplg',
    'htl'
];

$JURUSAN = array_map('strtoupper', $jurusan);
$Jurusan = array_unique($JURUSAN);
print_r($Jurusan);