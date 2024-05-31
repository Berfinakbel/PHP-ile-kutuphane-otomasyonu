<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kitap_ekle.css">
    <title>Halk Kitap Evi</title>
</head>
<body>

    <div class="main">
        <h1>Kitap Ekle</h1>
        <form action="kitap_ekle.php" method="post">

            <div class="main-box">
                <div class="input-box">
                    <span class="text">Barkod</span>
                    <input type="text" name="barkod" placeholder="Barkod..." required>
                </div>
                <div class="input-box">
                    <span class="text">Kitap Adı</span>
                    <input type="text" name="adi" placeholder=" Kitap Adı..." required>
                </div>
                <div class="input-box">
                    <span class="text">Yazar</span>
                    <input type="text" name="yazar" placeholder="Yazar..." required>
                </div>
                <div class="input-box">
                    <span class="text">Yayın Evi</span>
                    <input type="text" name="yayin_evi" placeholder="Yayın Evi..." required>
                </div>
                <div class="input-box">
                    <span class="text">Sayfa Sayısı</span>
                    <input type="text" name="sayfa_sayisi" placeholder="Sayfa Sayısı..." required>
                </div>
                <div class="input-box">
                    <span class="text">Adet</span>
                    <input type="text" name="adet" placeholder="Adet..." required>
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

$barkod = $_POST["barkod"];
$adi = $_POST["adi"];
$yazar = $_POST["yazar"];
$yayin_evi = $_POST["yayin_evi"];
$sayfa_sayisi = $_POST["sayfa_sayisi"];
$adet = $_POST["adet"];


include("baglanti.php");
if(mysqli_query ($baglanti, "INSERT INTO kitaplar VALUES ($barkod, '$adi', '$yazar' ,'$yayin_evi' ,$sayfa_sayisi, $adet )"))
{
    echo "<div class='popup'>Kayıt Başarılı.</div>
    <style>
    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: darkseagreen;
        padding: 20px;
        border: none;
        width: 15%;
      }
    </style>";
    header("refresh: 2 url= admin.php");
}
else
{
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
}

}


?>