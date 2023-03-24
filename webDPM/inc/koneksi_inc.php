<?php

$HOST = "localhost";
$user = "root";
$pass = "";
$db   = "dpmft2023";

$Koneksi = mysqli_connect($HOST,$user,$pass,$db);
if (!$Koneksi){
    die ("Turu");
}