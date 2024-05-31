<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <title>Halk Kitap Evi</title>
</head>
<body>
    
        <!-- navbar start -->
        <div class="menu-bar">
            <h1 class="logo">
              Halk Kitap Evi
              <span class="material-symbols-outlined"> book </span>
            </h1>
            <ul>
              <li ><a href="admin.php">Anasayfa</a></li>
              <li><a href="#">Üye İşlemleri <i class="fas fa-caret-down"></i></a>
                  <div class="dropdown-menu">
                      <ul>
                          <li><a href="uye_ekle.php">Üye Ekle</a></li>
                          <li><a href="uyeler.php">Üye Görüntüle</a></li>
                          
                      </ul>
                  </div>
              </li>
              <li><a href="#">Emanet & İade işlemleri <i class="fas fa-caret-down"></i></a>
                  <div class="dropdown-menu">
                      <ul>
                          <li><a href="emanetkitap.php">Emanet Kitap Ver</a></li>
                      </ul>
                  </div>
              </li>
              
      <form action="logout.php" method="post">
        <div class="btn">
          <li><a name="logout"><input class="cikis-btn" type="submit" value="Çıkış Yap"></a></li>
        </div>
    </form>
            </ul>
          </div>
      
          <!-- navbar finish -->    
          
</body>
</html>

<?php
include "baglanti.php";

// Tablo birleştirme ve veri çekme sorgusu
$sorgu = mysqli_query($baglanti, "
    SELECT emanet.id, emanet.tc, kitaplar.barkod, kitaplar.kitap_adi, uyeler.ad, uyeler.soyad, emanet.emanet_tarihi, emanet.teslim_tarihi, emanet.kitap_sayisi 
    FROM emanet 
    JOIN kitaplar ON emanet.barkod = kitaplar.barkod
    JOIN uyeler ON emanet.tc = uyeler.tc
");

echo "
<div class='table'>
<h1 class='title'>Emanet Verilen Kitaplar</h1>
<table border='1'>
    <tr>
        <td>IDentify</td>
        <td>TC - Üye Adı</td>
        <td>Barkod - Kitap Adı</td>
        <td>Emanet Tarihi</td>
        <td>Teslim Tarihi</td>
        <td>Adet</td>
        <td>İşlem</td>
    </tr>
</div>";

while ($satir = mysqli_fetch_assoc($sorgu)) {
    echo "
    <tr>
        <td>" .$satir["id"] . "</td>
        <td>" .$satir["tc"] . " - " . $satir["ad"] . " " . $satir["soyad"] . "</td>
        <td>" .$satir["barkod"] . " - " . $satir["kitap_adi"] . "</td>
        <td>" .$satir["emanet_tarihi"] . "</td>
        <td>" .$satir["teslim_tarihi"] . "</td>
        <td>" .$satir["kitap_sayisi"] . "</td>
        <td>
            <button class='tbl-btn'>
                <a href='iade_kitap_al.php?id=" .$satir["id"] . "'>İade Al</a>
            </button>
        </td>
    </tr>";
}
echo "</table>";
?>

<html>
  <body>
    <style>
body{
  overflow: hidden;
}

div.table{
  margin-top: 200px;
  margin-left: auto;
  margin-right:auto;
  height: 100%;
  border: none;
  border-color: transparent;
  width: 86.1%;
  max-height: auto; /* Tablonun maksimum yüksekliği */
  overflow-y: auto; /* Dikey scrollbar'ı otomatik olarak göster */
}

/* Webkit (Chrome, Safari) */
::-webkit-scrollbar {
    width: 12px; /* Scrollbar genişliği */
}

::-webkit-scrollbar-track {
    background: #212b38; /* Scrollbar izleme arka plan rengi */
}

::-webkit-scrollbar-thumb {
    background-color: #081A30; /* Scrollbar rengi */
    border-radius: 6px;
}

table{
  margin-top: auto;
  background: transparent;
  backdrop-filter: blur(5px);
  border: none;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  width: 100%;
  border-collapse: collapse;
  border-color: transparent;
}

tr {
  padding: 15px;
}

tr:first-child {
  background:#0073ff;
  color: #e9e9e9;
  font-weight: bold;
  position: sticky;
  top: 0;
}

tr:hover{
  background: #0b3d77;
  
}
td{
  height: 50px;
  vertical-align: bottom;
  text-align: center;
  justify-content: center;
  padding-bottom: 15px;
  border: none;
}

.tbl-btn {
 width: 80px;
 height: 35px;
 margin-bottom: -8px;
 color:#e9e9e9;
 border: none;
 background: #0073ff;
 font-size: 15px;
 font-weight:500;
 cursor: pointer;
}
a{
  text-decoration: none;
  color:#e9e9e9;
}
.cikis-btn{
  color: var(--color-primay);
  text-decoration: none;
  font-size: 20px;
  transition: all .0.3s;
  border: none;
  background: none;
  cursor: pointer;
}

    </style>
  </body>
</html>
