<?php
function conectar(){
    $servidor = "localhost";
    $usuarioBD = "root";
    $pwdBD = "";
    $nomBD = "examenu3u4";

    $db = mysqli_connect($servidor,$usuarioBD,$pwdBD,$nomBD);
    return $db;
}
?>
