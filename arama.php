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
    </div>

    <!-- navbar finish -->
    
    <div class="container">

      <div class="text">

        <h1 class="title">Mevcut Kitaplar</h1>
      </div>
      <form action="arama.php" method="GET">
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


// Kullanıcının arama kelimesini al
if(isset($_GET['search'])) {
  
  $search = $_GET['search'];
  
  // SQL sorgusu oluştur
  $baglanti = mysqli_connect("localhost", "root", "", "kutuphane");
  $sql = "SELECT * FROM kitaplar WHERE kitap_adi LIKE '%$search%' OR yazar LIKE '%$search%'";
  // Sorguyu çalıştır ve sonucu al
  $result = mysqli_query($baglanti, $sql);

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
        </tr> 
        <div/>";
      while($row = mysqli_fetch_assoc($result)) {  // Her bir satır için döngüye al
        echo "
        <tr>
        <td>".$row["barkod"]."</td>
        <td>".$row["kitap_adi"]."</td>
        <td>".$row["yazar"]."</td>
        <td>".$row["yayin_evi"]."</td>
        <td>".$row["sayfa_sayisi"]."</td>
        <td>".$row["adet"]."</td>
        </tr>";

        }
        echo"
        </table>"; 
      }

  else {
            echo "Aranan kelimeye uygun sonuç bulunamadı.";
       }

?>

<html>
  <body>
    <style>

body{
  overflow: hidden;
}

::selection{
  color: aquamarine;
}

.container{
  margin-top: 100px;
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

.search{
  right: 65px;
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
    </style>
  </body>
</html>
