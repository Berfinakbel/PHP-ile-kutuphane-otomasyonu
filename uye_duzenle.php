<?php
include("baglanti.php"); 

if (isset($_GET['tc'])) {
    $tc = $_GET['tc'];
    $sonuc = mysqli_query($baglanti, "SELECT * FROM uyeler WHERE tc='$tc'");
    $satir = mysqli_fetch_assoc($sonuc);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Düzenle</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="kitap_ekle.css">
</head>
<body>
<div class="main">
        <h2>Üye Düzenle</h2>
        <form method="post">
        <div class="main-box">

        <div class="input-box">
                <span class="text">TC</span>
                <input type="text" id="TC" name="tc" value="<?php echo $satir['tc']; ?>" readonly>
                </div>

                <div class="input-box">
                <span class="text">Ad</span>
                <input type="text" id="ad" name="ad" value="<?php echo $satir['ad']; ?>" required>
                </div>

                <div class="input-box">
                    <span class="text">Soyad:</span>
                    <input type="text" id="soyad" name="soyad" value="<?php echo $satir['soyad']; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Telefon Numarası</span>
                    <td><input type="number" id="telefon" name="telefon" value="<?php echo $satir['telefon']; ?>" required>
                </div>
                <div class="input-box">
                    <span class="text">Adres</span>
                    <input type="text" id="adres" name="adres" value="<?php echo $satir['adres']; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">E-Posta</span>
                    <input type="email" id="e_posta" name="e_posta" value="<?php echo $satir['e_posta']; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Cinsiyet</span>
                    <input type="text" id="cinsiyet" name="cinsiyet" value="<?php echo $satir['cinsiyet']; ?>"required>
                </div>
                <div class="input-box">
                    <span class="text">Doğum Tarihi</span>
                    <input type="date" id="dogum_tarihi" name="dogum_tarihi" value="<?php echo $satir['dogum_tarihi']; ?>"required>
                </div>
                <div class="btn">
                <input type="submit" name="kaydet" value="Kaydet">
                </div>
                <input type="hidden"name="tc" value="<?php echo $satir['tc']; ?>">
            </div>
        </table>
    </form>
</body>
</html>

<?php

include("baglanti.php"); 


if(isset($_POST["kaydet"])){ 
    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $cinsiyet = $_POST['cinsiyet'];
    $telefon = $_POST['telefon'];
    $adres = $_POST['adres'];
    $e_posta = $_POST['e_posta'];

    $query = "UPDATE uyeler SET ad='$ad', soyad='$soyad', dogum_tarihi='$dogum_tarihi', cinsiyet='$cinsiyet', telefon='$telefon', adres='$adres', `e_posta`='$e_posta' WHERE tc='$tc'";
    mysqli_query($baglanti, $query);

    header("Location: uyeler.php");
    exit(); 
}
?>


