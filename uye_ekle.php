<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <link rel="stylesheet" href="uye_ekle.css" />
    <title>Halk Kitap Evi</title>
  </head>
  <body>
    <div class="main">
      <h1>Üye Ekle</h1>
      <form action="uye_ekle.php" method="post">
        <div class="main-box">

        <div class="input-box">
            <span class="text">T.C.</span>
            <input name="tc" type="text" placeholder="T.C." required />
          </div>

          <div class="input-box">
            <span class="text">Ad</span>
            <input name="ad" type="text" placeholder="Ad..." required />
          </div>

          <div class="input-box">
            <span class="text">Soyad</span>
            <input name="soyad" type="text" placeholder="Soyad..." required />
          </div>

          <div class="input-box">
            <span class="text">E-posta</span>
            <input name="mail" type="email" placeholder="E-posta..." required />
          </div>

          <div class="input-box">
            <span class="text">Telefon</span>
            <input name="telefon" type="text" placeholder="Telefon..."  required />
          </div>

          <div class="input-box">
            <span class="text">Adres</span>
            <input name="adres" type="text" placeholder="Adres..." required />
          </div>

          <div class="input-box">
            <span class="text">Doğum Tarihi</span>
            <input name="dogum_tarihi" type="date" required />
          </div> 

          <div class="input-box">
            <span class="text">Cinsiyet</span>
            <input name="cinsiyet" type="text" placeholder="Cinsiyet..."  required />
          </div>

        </div>

        
        <div class="btn">
            <input name="kaydet" type="submit" value="Kaydet">
        </div>
      </form>
    </div>
  </body>
</html>

<?php


if(isset($_POST["kaydet"])){
  
    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $cinsiyet = $_POST['cinsiyet'];
    $telefon = $_POST['telefon'];
    $adres = $_POST['adres'];
    $e_posta = $_POST['mail'];

    include("baglanti.php");

    $sorgu = "INSERT INTO uyeler (tc, ad, soyad, dogum_tarihi, cinsiyet, telefon, adres, e_posta) VALUES ('$tc', '$ad', '$soyad', '$dogum_tarihi', '$cinsiyet', '$telefon', '$adres', '$e_posta')";
    
    if (mysqli_query($baglanti, $sorgu)) {
      echo "<div class='popup'>Kayıt Başarılı.</div>
      <style>
      .popup {
          position: fixed;
          top: 99%;
          left: 99%;
          transform: translate(-99%, -99%);
          background: darkseagreen;
          padding: 20px;
          border: none;
          width: 10%;
        }
      </style>";
      header("refresh: 2 url= uyeler.php");
    } else {
      echo "<div class='popup'>Kayıt Başarısız.</div>
      <style>
      .popup {
          position: fixed;
          top: 99%;
          left: 99%;
          transform: translate(-99%, -99%);
          background: darkseagreen;
          padding: 20px;
          border: none;
          width: 10%;
        }
      </style>";
      header("refresh: 2 url= uyeler.php");
}
}

?>