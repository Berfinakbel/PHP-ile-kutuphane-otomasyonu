<!DOCTYPE html>
<html lang="en">
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
  
  <style>
    .search {
      right: 65px;
    }
  </style>

</head>
<body>
  <div class="menu-bar">
    <h1 class="logo">
      Halk Kitap Evi
      <span class="material-symbols-outlined"> book </span>
    </h1>
    <ul>
      <li><a href="admin.php">Anasayfa</a></li>
      <li><a href="uye_ekle.php">Üye Ekle</a></li>
      <li>
        <a href="#">Emanet & İade işlemleri <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="emanetkitap.php">Emanet Kitap Ver</a></li>
            <li><a href="emanet_verilen_kitaplar.php">Emanet Verilen Kitaplar</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <div class="container">
    <div class="text">
      <h1 class="title">Üye Arama</h1>
      </div>
          <form action="uyeler.php" method="GET">
          <div class="search">
          <input class="input-search" name="search" type="search" placeholder="Ara..." >
          <button class="search-btn" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </form>
    </div>
  </div>

  <?php

// Kullanıcının arama kelimesini al
if(isset($_GET['search'])) {
  
    $search = $_GET['search'];
    
    // SQL sorgusu oluştur
    $baglanti = mysqli_connect("localhost", "root", "", "kutuphane");
    $sorgu = "SELECT * FROM uyeler WHERE ad LIKE '%$search%' OR tc LIKE '%$search%'";
    // Sorguyu çalıştır ve sonucu al
    $result = mysqli_query($baglanti, $sorgu);
  
    // Sonuçları işle
    
        
          echo "
          <div class='table'>
          <table border = '1'>
          <tr>
          <td> T.C. </td> 
          <td> Ad </td> 
          <td> Soyad </td> 
          <td> Doğum Tarihi </td>
          <td> Cinsiyet </td>  
          <td> Telefon </td> 
          <td> Adres </td> 
          <td> E-Posta </td> 
          </tr> 
          <div/>";
        while($row = mysqli_fetch_assoc($result)) {  
          echo "
          <tr>
          <td>".$row["tc"]."</td>
          <td>".$row["ad"]."</td>
          <td>".$row["soyad"]."</td>
          <td>".$row["dogum_tarihi"]."</td>
          <td>".$row["cinsiyet"]."</td>
          <td>".$row["telefon"]."</td>
          <td>".$row["adres"]."</td>
          <td>".$row["e_posta"]."</td>
          
          </tr>";
  
          }
          echo"
          </table>"; 
        }
  
  ?>

</body>
</html>
