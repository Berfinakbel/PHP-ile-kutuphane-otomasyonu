<?php
session_start();

if(!isset( $_SESSION['kullanici'])){

  header("Location:login.php");
  die();
  exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Admin Sayfası</title>
  </head>
  <body>
    <style>
      body{
        overflow: hidden;
      }
    </style>
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
                    <li><a href="emanet_verilen_kitaplar.php">Emanet Verilen Kitaplar</a></li>
                </ul>
            </div>
        </li>
        
          
 <form action="logout.php" method="post">
        <div class="btn">
          <li><a name="logout"><input class="cikis-btn" type="submit" value="Çıkış Yap"></a></li>
        </div>
    </form>
         </div>
   
      </ul>
    </div>

    <!-- navbar finish -->

      
    <div class="container">

      <div class="text">

        <h1 class="title">Mevcut Kitaplar</h1>
      </div>
        <div class="search">

          <form action="admin_arama.php" method="GET">
          <input class="input-search" name="search" type="search" placeholder="Ara..." >
          <button class="search-btn" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        </form>
        <button class="add-book" type="submit">
          <a href="kitap_ekle.php">Kitap Ekle</a>
          
        </button>

    </div>

  </body>
</html>

<?php

include("baglanti.php");
$sorgu = mysqli_query($baglanti,"SELECT * FROM kitaplar");

echo "
<div class='table'>
<table border = '0'>
<tr>
<td> Barkod </td> 
<td> Kitap Adı </td> 
<td> Yazar </td> 
<td> Yayın Evi </td> 
<td> Sayfa Sayısı </td> 
<td> Stok </td> 
<td colspan='2'> İşlemler </td>
</tr> 
<div/>";

while($satir = mysqli_fetch_assoc($sorgu)){

echo "
<tr>
<td>".$satir["barkod"]."</td>
<td>".$satir["kitap_adi"]."</td>
<td>".$satir["yazar"]."</td>
<td>".$satir["yayin_evi"]."</td>
<td>".$satir["sayfa_sayisi"]."</td>
<td>".$satir["adet"]."</td>
<td> <button class='tbl-btn'><a href='duzenle.php?barkod=".$satir["barkod"]."'>Güncelle</a></button></td>
<td> <button class='tbl-btn'><a href='sil.php?barkod=".$satir["barkod"]."'>Sil</a></button></td>

</tr>";
}

echo"
</table>";


?>

<html>
  <body>
    <style>
body {
  overflow: hidden;
}

div.table {
  height: 65%;
  border: none;
  border-color: transparent;
  width: 86%;
  margin: auto;
  max-height: 450px; /* Tablonun maksimum yüksekliği */
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

table {
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
  background: #0073ff;
  color: #e9e9e9;
  font-weight: bold;
  position: sticky;
  top: 0;
}

tr:hover {
  background: #0b3d77;
}

td {
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
  color: #e9e9e9;
  border: none;
  background: #0073ff;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
}

td a {
  text-decoration: none;
  color: #e9e9e9;
}

.cikis-btn {
  color: var(--color-primary);
  text-decoration: none;
  font-size: 20px;
  transition: all 0.3s;
  border: none;
  background: none;
  cursor: pointer;
}

/* Responsive Styles */
@media screen and (max-width: 1200px) {
  div.table {
    width: 90%;
  }

  td {
    font-size: 18px;
  }

  .tbl-btn {
    width: 70px;
    height: 30px;
    font-size: 14px;
  }
}

@media screen and (max-width: 992px) {
  div.table {
    width: 95%;
  }

  td {
    font-size: 16px;
  }

  .tbl-btn {
    width: 60px;
    height: 28px;
    font-size: 13px;
  }
}

@media screen and (max-width: 768px) {
  div.table {
    width: 100%;
  }

  td {
    font-size: 14px;
    padding-bottom: 10px;
  }

  .tbl-btn {
    width: 50px;
    height: 25px;
    font-size: 12px;
  }
}

@media screen and (max-width: 576px) {
  div.table {
    width: 100%;
    margin: 0;
  }

  td {
    font-size: 12px;
    padding-bottom: 5px;
  }

  .tbl-btn {
    width: 40px;
    height: 20px;
    font-size: 10px;
  }
}


    </style>
  </body>
</html>