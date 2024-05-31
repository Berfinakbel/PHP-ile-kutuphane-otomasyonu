function fetchBookDetails(barkod) {
  if (barkod == "") {
    document.getElementById("kitap_adi").value = "";
    document.getElementById("yazar").value = "";
    document.getElementById("sayfa_sayisi").value = "";
    return;
  } else {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var book = JSON.parse(this.responseText);
        document.getElementById("kitap_adi").value = book.kitap_adi;
        document.getElementById("yazar").value = book.yazar;
        document.getElementById("sayfa_sayisi").value = book.sayfa_sayisi;
      }
    };
    xhr.open("GET", "kitapbilgilericek.php?barkod=" + barkod, true);
    xhr.send();
  }
}