<?php

$id=$_GET["id"];

include("baglanti.php");


$sorgu = mysqli_query($baglanti, "SELECT  emanet.id, emanet.tc, emanet.barkod, kitaplar.kitap_adi, uyeler.ad, uyeler.soyad, emanet.emanet_tarihi, emanet.teslim_tarihi, emanet.kitap_sayisi  FROM emanet 
JOIN kitaplar ON emanet.barkod = kitaplar.barkod
JOIN uyeler ON emanet.tc = uyeler.tc");

$satir = mysqli_fetch_assoc($sorgu);


if(isset($_POST["iade_al"])){

$id = $_POST["id"];
$tc = $_POST["tc"];
$barkod = $_POST["barkod"];
$emanet_tarihi = $_POST["emanet_tarihi"];
$teslim_tarihi = $_POST["teslim_tarihi"];
$kitap_sayisi = $_POST["kitap_sayisi"];

mysqli_query($baglanti, "DELETE FROM emanet WHERE id = '$id'");

if(mysqli_affected_rows($baglanti)) {
    echo "<script>
            var popup = document.createElement('div');
            popup.innerHTML = '<p>İade Başarıyla Alındı.</p>';
            popup.classList.add('popup');
            document.body.appendChild(popup);
            setTimeout(function(){
                popup.style.display = 'none';
                window.location = 'emanet_verilen_kitaplar.php?id=".$id."';
            }, 2000);
          </script>";
} else {
    echo "<script>
            var popup = document.createElement('div');
            popup.innerHTML = '<p>Hata: İade Alınamadı!</p>';
            popup.classList.add('popup');
            document.body.appendChild(popup);
            setTimeout(function(){
                popup.style.display = 'none';
                window.location = 'emanet_verilen_kitaplar.php?id=".$id."';
            }, 2000);
          </script>";
}
}




if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Emanet kaydını almak için sorgu
    $sorgu = mysqli_query($baglanti, "SELECT * FROM emanet WHERE id = $id");
    $emanet = mysqli_fetch_assoc($sorgu);

    if ($emanet) {
        $barkod = $emanet['barkod'];

        // Kitap stoğunu güncelle
        $update = "UPDATE kitaplar SET adet = adet + 1 WHERE barkod = '$barkod'";
        if ($baglanti->query($update) === TRUE) {
            // Emanet kaydını sil
            $delete = "DELETE FROM emanet WHERE id = $id";
            if ($baglanti->query($delete) === TRUE) {
                echo "<script>
                var popup = document.createElement('div');
                popup.innerHTML = '<p>İade Başarıyla Alındı.</p>';
                popup.classList.add('popup');
                document.body.appendChild(popup);
                setTimeout(function(){
                    popup.style.display = 'none';
                    window.location = 'emanet_verilen_kitaplar.php?id=".$id."';
                }, 2000);
              </script>";
            } else {
                echo "Hata: " . $baglanti->error;
            }
        } else {
            echo "Hata: " . $baglanti->error;
        }
        
        // Ana sayfaya veya uygun bir sayfaya yönlendirme
        header("Location: emanet_verilen_kitaplar.php");
        exit();
    } else {
        echo "Geçersiz emanet kaydı.";
    }
} else {
    echo "Geçersiz istek.";
}

?>