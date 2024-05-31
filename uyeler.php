<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halk Kitap Evi</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="uyeler.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  
</head>
<body>
  <div class="menu-bar">
    <h1 class="logo">
      Halk Kitap Evi
      <span class="material-symbols-outlined"> book </span>
    </h1>
    <ul>
      <li><a href="admin.php">Anasayfa</a></li>
      <li>
        <a href="uye_ekle.php">Üye Ekle</a>
      </li>
      <li>
        <a href="#">Emanet & İade işlemleri <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="emanetkitap.php">Emanet Kitap Ver</a></li>
            <li><a href="emanet_verilen_kitaplar.php">Emanet Verilen Kitaplar</a></li>
            <li><a href="iade_kitap_al.php">İade Kitap Al</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>


      
  <div class="container">

<div class="text">

  <h1 class="title">Üyeler</h1>
</div>
<form action="uye_arama.php" method="GET">
  <div class="search">
    <input class="input-search" name="search" type="search" placeholder="Ara..." >
    <button class="search-btn"  type="submit" title="Ara">
    <i class="fa-solid fa-magnifying-glass"></i></button>
  </form>
  </div>
</div>

</body>
</html>



<?php

include("baglanti.php");

$sonuclar = mysqli_query($baglanti, "SELECT * FROM uyeler" );

echo "
<div class='table'>
<table border='0'>
<tr><td>T.C.</td>
<td>Ad</td>
<td>Soyad</td>
<td>Doğum Tarihi </td>
<td>Cinsiyet</td>
<td>Telefon</td>
<td>Adres</td>
<td>E-Posta</td>
<td colspan='2'> İşlemler </td>
</tr>
<div/>";
while ($satir = mysqli_fetch_assoc($sonuclar)) {
    echo "
   <tr>
   <td>" . $satir['tc'] . "</td>
   <td>" . $satir['ad'] . "</td>
   <td>" . $satir['soyad'] . "</td>
   <td>" . $satir['dogum_tarihi'] . "</td>
   <td>" . $satir['cinsiyet'] . "</td>
   <td>" . $satir['telefon'] . "</td>
   <td>" . $satir['adres'] . "</td>
   <td>" . $satir['e_posta'] . "</td>
   <td> <button class='tbl-btn'><a href='uye_duzenle.php?tc=".$satir["tc"]."'>Güncelle</a></button></td>
   <td> <button class='tbl-btn'><a href='uye_sil.php?tc=".$satir["tc"]."'>Sil</a></button></td>
   </tr>";
  }
echo "</table>";
?>


