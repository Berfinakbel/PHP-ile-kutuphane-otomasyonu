<?php

include "baglanti.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $cinsiyet = $_POST['cinsiyet'];
    $telefon = $_POST['telefon'];
    $adres = $_POST['adres'];
    $e_posta = $_POST['e_posta'];

    $query = "UPDATE uyeler SET ad='$ad', soyad='$soyad', dogum_tarihi='$dogum_tarihi', cinsiyet='$cinsiyet', telefon='$telefon', adres='$adres', `e_posta`='$e_posta' WHERE tc='$tc'";
    mysqli_query($baglanti, $query);

    header("Location: uyeler.php");
}
?>
