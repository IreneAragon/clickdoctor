
$(document).ready(function() {
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'perfil/upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {

              if (response == 2) {
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Selecciona una imagen primero'
                    })
              } else if (response == 1) {
                  Swal.fire({
                      icon: 'error',
                      title: 'Formato de imagen incorrecto',
                      text: 'Formatos admitidos: pjpeg, jpeg, png, gif'
                    })
              } else if (response == 0) {
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Hubo un problema con la operación, prueba de nuevo'
                    })
              } else if (response != 0 || response != 1 || response != 2) {
                  $(".avatar").attr("src", response);
              }
            }
        });
        return false;
    });
});

var imgBtn = document.getElementById('img');
var fileInp = document.getElementById('image');

imgBtn.addEventListener('click', function() {
  fileInp.click();
});
