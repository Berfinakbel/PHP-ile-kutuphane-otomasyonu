<?php
include("baglanti.php");

$tc = $_GET['tc'];

$silme_sorgusu = "DELETE FROM uyeler WHERE tc = '$tc'";

mysqli_query($baglanti, $silme_sorgusu);

mysqli_close($baglanti);

header("Location: uyeler.php");
exit;
?>
