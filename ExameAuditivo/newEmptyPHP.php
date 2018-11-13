<?php

$letras = ["m", "D", " ", "e", " ", "G", "v", "e", "i", "e", " ", "r", "S", "G", "D", "u"];
$caminho = [ 12, 7, 11, 9, 8, 4, 15, 0, 2, 13, 14, 5, 10, 1, 3, 6];
echo Decodifica($letras, $caminho);

function Decodifica($aLetras, $aCaminho) {
    $frase = '';
    foreach ($aCaminho as $valor) {
        $frase .= $aLetras[$valor];
    }
    return $frase;
}
