<?php

$barkod=$_GET["barkod"];

include("baglanti.php");


$sorgu = mysqli_query($baglanti, "SELECT * FROM kitaplar WHERE barkod=$barkod");

$satir = mysqli_fetch_assoc($sorgu);


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kitap_ekle.css">
    <link rel="stylesheet" href="duzenle.css">
    <title>Halk Kitap Evi</title>
</head>
<body>

<div class="main">
        <h1>Kitap Güncelle</h1>
        <form action="duzenle.php?barkod=<?php echo $satir["barkod"]; ?>" method="post">

            <div class="main-box">
                <div class="input-box">
                    <span class="text">Barkod</span>
                    <input type="text" name="barkod" placeholder="Barkod..." value="<?php echo $satir["barkod"]; ?>" required>
                </div>
                <div class="input-box">
                    <span class="text">Kitap Adı</span>
                    <input type="text" name="adi" placeholder=" Kitap Adı..." value="<?php echo $satir["kitap_adi"]; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Yazar</span>
                    <input type="text" name="yazar" placeholder="Yazar..." value="<?php echo $satir["yazar"]; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Yayın Evi</span>
                    <input type="text" name="yayin_evi" placeholder="Yayın Evi..." value="<?php echo $satir["yayin_evi"]; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Sayfa Sayısı</span>
                    <input type="text" name="sayfa_sayisi" placeholder="Sayfa Sayısı..." value="<?php echo $satir["sayfa_sayisi"]; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Adet</span>
                    <input type="text" name="adet" placeholder="Adet..." value="<?php echo $satir["adet"]; ?>"required>
                </div>

                <div class="btn">
                    <input type="submit" value="Kaydet" name="kaydet">
                    
                </div>
            </div>

        
        </form>

    </div>

</body>

</html>


<?php

if(isset($_POST["kaydet"])){

$barkod = $_POST["barkod"];
$adi = $_POST["adi"];
$yazar = $_POST["yazar"];
$yayin_evi = $_POST["yayin_evi"];
$sayfa_sayisi = $_POST["sayfa_sayisi"];
$adet = $_POST["adet"];

mysqli_query($baglanti, "UPDATE kitaplar SET kitap_adi = '$adi', yazar='$yazar', yayin_evi= '$yayin_evi', sayfa_sayisi = $sayfa_sayisi, adet = $adet WHERE barkod= $barkod ");

if(mysqli_affected_rows($baglanti)) {
    echo "<script>
            var popup = document.createElement('div');
            popup.innerHTML = '<p>Güncelleme Başarıyla Tamamlandı.</p>';
            popup.classList.add('popup');
            document.body.appendChild(popup);
            setTimeout(function(){
                popup.style.display = 'none'; 
                window.location = 'admin.php?barkod=".$barkod."';
            }, 2000);
          </script>";
} else {
    echo "<script>
            var popup2 = document.createElement('div');
            popup2.innerHTML = '<p>Hiçbir Değişiklikte Bulunmadınız!</p>';
            popup2.classList.add('popup2');
            document.body.appendChild(popup2);
            setTimeout(function(){
                popup2.style.display = 'none';
                window.location = 'admin.php?barkod=".$barkod."';
            }, 2000);
          </script>";
}
}

?>