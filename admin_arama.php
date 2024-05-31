<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
   
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
        <li><a href="admin.php">Anasayfa</a></li>
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
      </ul>
    </div>

    <!-- navbar finish -->


      
    <div class="container">

      <div class="text">

        <h1 class="title">Mevcut Kitaplar</h1>
      </div>
          <form action="admin.php" method="GET">
          <div class="search">
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

// Kullanıcının arama kelimesini al
if(isset($_GET['search'])) {
  
    $search = $_GET['search'];
    
    // SQL sorgusu oluştur

    include "baglanti.php";

    $sorgu = "SELECT * FROM kitaplar WHERE kitap_adi LIKE '%$search%' OR yazar LIKE '%$search%'";
    // Sorguyu çalıştır ve sonucu al
    $result = mysqli_query($baglanti, $sorgu);
  
    // Sonuçları işle
    
        
          echo "
          <div class='table'>
          <table border = '1'>
          <tr>
          <td> Barkod </td> 
          <td> Kitap Adı </td> 
          <td> Yazar </td> 
          <td> Yayın Evi </td> 
          <td> Sayfa Sayısı </td> 
          <td> Adet </td> 
          <td colspan='2'> İşlemler </td> 
          </tr> 
          <div/>";
        while($row = mysqli_fetch_assoc($result)) {  
          echo "
          <tr>
          <td>".$row["barkod"]."</td>
          <td>".$row["kitap_adi"]."</td>
          <td>".$row["yazar"]."</td>
          <td>".$row["yayin_evi"]."</td>
          <td>".$row["sayfa_sayisi"]."</td>
          <td>".$row["adet"]."</td>
          <td> <button class='tbl-btn'> <a href='duzenle.php?barkod=".$row["barkod"]."'>Güncelle</a></button></td>
          <td> <input name='sil' type='submit' value='Sil' class='tbl-btn'sil.php?barkod=".$row["barkod"]."> </button></td>
          </tr>";
  
          }
          echo"
          </table>"; 
        }
  
  ?>
  
  <html>
    <body>
      <style>
  body{
        overflow: hidden;
      }

div.table{
  height:65%;
  border: none;
  border-color: transparent;
  width: 86%;
  margin:auto;
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

table{
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

td a{
  text-decoration: none;
  color:#e9e9e9;
}
      </style>
    </body>
  </html>
  
 
  