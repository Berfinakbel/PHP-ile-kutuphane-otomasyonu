<?php
    session_start(); // Oturumu başlat
        session_destroy();
        echo"<script>
        alert('Çıkış Yapılıyor. Giriş sayfasına Yönlendiriliyorsunuz...');
        window.location.href = 'login.php';
     </script>";
    
    exit;
?>