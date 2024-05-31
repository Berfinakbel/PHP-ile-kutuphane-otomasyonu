<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Admin Giriş</title>
</head>
<body>

    <!-- kullanıcı giriş başlangıç -->

<div class="wrapper">

    <form action="login.php" method="post">

        <h1>Admin Giriş</h1>
        <div class="input-box">
            <input type="text" name="kullanici" placeholder="Kullanıcı Adı" required >

            <div class="input-box">
                <input type="password" name="sifre" placeholder="Şifre" required>
              </div>  

                <div class="btn">
                <input name="giris" type="submit" value="Giriş">
                </div>
    </form>
</div>

    <!-- kullanıcı giriş bitiş -->
    

</body>
</html>

<?php
session_start(); // Oturumu başlat 
if(isset($_POST["giris"])){
$username = $_POST['kullanici'];
$password = $_POST['sifre'];

include("baglanti.php");
$sonuc = mysqli_query($baglanti,"SELECT * FROM adminn WHERE kullanici_adi = '$username' AND sifre = '$password'");
$kontrol = mysqli_fetch_assoc($sonuc);

if(empty($kontrol)){
    echo '<div class="info">Kullanıcı adı veya şifre hatalı</div>
    
    <style>
    .info
    {
         padding: 55px 0 0 70px;
         text-decoration: underline;
    }
    </style>';

}
else{
    $_SESSION['kullanici'] = $username; // Oturum değişkenini ayarla
    // Diğer işlemleri gerçekleştir, örneğin ana sayfaya yönlendirme yapabilirsiniz.
    header("Location: admin.php");
}

}

?>
