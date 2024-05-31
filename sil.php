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
        <h1>Kitap Sil</h1>
        <form action="sil.php?barkod=<?php echo $satir["barkod"]; ?>" method="post">

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
                    <input type="submit" value="Sil" name="sil">
                    
                </div>
            </div>

        
        </form>

    </div>

</body>
</html>


<?php

if(isset($_POST["sil"])){

$barkod = $_POST["barkod"];
$adi = $_POST["adi"];
$yazar = $_POST["yazar"];
$yayin_evi = $_POST["yayin_evi"];
$sayfa_sayisi = $_POST["sayfa_sayisi"];
$adet = $_POST["adet"];

mysqli_query($baglanti, "DELETE FROM kitaplar WHERE barkod = '$barkod'");

if(mysqli_affected_rows($baglanti)) {
    echo "<script>
            var popup = document.createElement('div');
            popup.innerHTML = '<p>Kayıt Başarıyla Silindi.</p>';
            popup.classList.add('popup');
            document.body.appendChild(popup);
            setTimeout(function(){
                popup.style.display = 'none';
                window.location = 'admin.php?barkod=".$barkod."';
            }, 2000);
          </script>";
} else {
    echo "<script>
            var popup = document.createElement('div');
            popup.innerHTML = '<p>Hata: Kayıt Silinemedi!</p>';
            popup.classList.add('popup');
            document.body.appendChild(popup);
            setTimeout(function(){
                popup.style.display = 'none';
                window.location = 'admin.php?barkod=".$barkod."';
            }, 2000);
          </script>";
}
}

?>