
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halk Kitap Evi</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="emanetkitap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="iziToast.min.css">
    </head>
    
</html>
  <body>
    <div class="main">
        <h2>Emanet Kitap Ver</h2>
        <form action="emanetkitapkaydet.php" method="post">
            <div class="main-box">
                <div class="input-box">
                    <label for="kullanici_tc">Üye TC:</label>
                    <input type="text" id="kullanici_tc" name="kullanici_tc" required/>

                    <label for="kitap_adi">Kitap Adı:</label>
                    <input type="text" id="kitap_adi" name="kitap_adi" readonly/>

                    <label for="sayfa_sayisi">Sayfa Sayısı:</label>
                    <input type="text" id="sayfa_sayisi" name="sayfa_sayisi" readonly/>

                    <label for="barkod">Kitap Barkod No:</label>
                    <select name="barkod" id="barkod" onchange="fetchBookDetails(this.value)">
    <option value="">Barkod Seçin</option> 
    <?php
        include "baglanti.php";

        if ($baglanti->connect_error) {
            die("Bağlantı hatası: " . $baglanti->connect_error);
        }

        $sorgu = "SELECT barkod, kitap_adi FROM kitaplar";
        $sonuc = $baglanti->query($sorgu);

        if ($sonuc->num_rows > 0) {
            while($satir = $sonuc->fetch_assoc()) {
                echo "<option value='" . $satir["barkod"] . "'>" . $satir["barkod"] . " - " . $satir["kitap_adi"] . "</option>";
            }
        } else {
            echo "<option value=''>Kayıt bulunamadı</option>";
        }
        $baglanti->close();
    ?>
</select>

                    
                    <label for="yazar">Yazar:</label>
                    <input type="text" id="yazar" name="yazar" readonly/>

                    <label for="kitap_sayisi">Alınan Kitap Sayısı:</label>
                    <input type="number" id="kitap_sayisi" name="kitap_sayisi" required/>

                    <label for="emanet_tarihi">Emanet Tarihi:</label>
                    <input type="date" id="emanet_tarihi" name="emanet_tarihi" required/>

                    <label for="teslim_tarihi">Teslim Tarihi:</label>
                    <input type="date" id="teslim_tarihi" name="teslim_tarihi" required/>
                </div>
            </div>
            <div class="btn">
                <input name="emanet ver" type="submit" value="Emanet Ver">
            </div>
        </form>
    </div>

    <script src="kitapbilgilericek.js"></script>
    <script src="iziToast.min.js" type="text/javascript"></script>
    <script src="bildirim1.js"></script>
</body>
</html>
