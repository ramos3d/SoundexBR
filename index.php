<?php
/**
 *
 */
include 'classes/Soundex.php';
$obj = new Soundex;

$str = "Marcelo Ramos Soares";

//Soundex com 15 dígitos
echo "<p>".$obj->SoundexBR($str)."</p>";

// Chave Fonética
echo "<p>".$obj->chaveFonetica($str)."</p>";
