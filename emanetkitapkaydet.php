<?php



// Veritabanı bağlantısını oluştur
include "baglanti.php";

// Bağlantı hatası varsa hata mesajı döndür ve işlemi sonlandır
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

// POST verilerini al
$kullanici_tc = $_POST['kullanici_tc'];
$barkod = $_POST['barkod'];
$emanet_tarihi = $_POST['emanet_tarihi'];
$teslim_tarihi = $_POST['teslim_tarihi'];
$kitap_sayisi = $_POST['kitap_sayisi'];

// Kullanıcıyı kontrol et
$sql = "SELECT * FROM uyeler WHERE tc = '$kullanici_tc'";
$sonuc = $baglanti->query($sql);

// Kullanıcı yoksa hata mesajı döndür
if ($sonuc->num_rows == 0) {
    echo "Bu TC'ye ait bir üye bulunamadı.";
} else {

    $sql_emanet = "INSERT INTO emanet (tc, barkod, emanet_tarihi, teslim_tarihi, kitap_sayisi) 
            VALUES ('$kullanici_tc', '$barkod', '$emanet_tarihi', '$teslim_tarihi', '$kitap_sayisi')";

    
    if ($baglanti->query($sql_emanet) === TRUE) {
        $sql_adet_guncelle = "UPDATE kitaplar SET adet = adet - $kitap_sayisi WHERE barkod = '$barkod'";
        
        if ($baglanti->query($sql_adet_guncelle) === TRUE) {
            echo "success";
        } else {
            echo "Hata: " . $sql_adet_guncelle . "<br>" . $baglanti->error;
        }
    } else {
    
        echo "Hata: " . $sql_emanet . "<br>" . $baglanti->error;
    }
}


$baglanti->close();
?>
