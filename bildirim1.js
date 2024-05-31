  document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); 

   
    var formData = new FormData(this);

    
    fetch('emanetkitapkaydet.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      if (data === 'success') {
        iziToast.success({
          title: 'Başarılı',
          message: 'Yeni kayıt başarıyla eklendi.',
          position: 'bottomRight'
        });

        setTimeout(function(){
          window.location.href = 'admin.php';
        }, 2000); 
      } else {
        iziToast.error({
          title: 'Hata',
          message: data,
          position: 'bottomRight'
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});