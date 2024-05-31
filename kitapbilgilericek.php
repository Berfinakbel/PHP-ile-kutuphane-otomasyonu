<?php
 $baglanti = mysqli_connect("localhost", "root", "", "kutuphane");

if ($baglanti->connect_error) {
  die("Baglanti hatasi: " . $baglanti->connect_error);
}

if (isset($_GET['barkod'])) {
  $barkod = $_GET['barkod'];

  $sql = "SELECT kitap_adi, yazar, sayfa_sayisi FROM kitaplar WHERE barkod = ?";
  $stmt = $baglanti->prepare($sql);
  $stmt->bind_param("s", $barkod);
  $stmt->execute();
  $stmt->bind_result($kitap_adi, $yazar, $sayfa_sayisi);
  $stmt->fetch();

  $kitap = array(
    "kitap_adi" => $kitap_adi,
    "yazar" => $yazar,
    "sayfa_sayisi" => $sayfa_sayisi
  );

  echo json_encode($kitap);

  $stmt->close();
}

$baglanti->close();
?>
