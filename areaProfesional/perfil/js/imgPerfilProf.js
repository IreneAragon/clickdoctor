console.log('entra jsjsjsjs');

$(document).ready(function() {
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'perfil/uploadProf.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              // console.log('resss',response);

              if (response == 2) {
                // console.log('222222222222222222');
                  // alert('Seleccione una imagen primero');
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Seleccione una imagen primero'
                      // footer: '<a href>Why do I have this issue?</a>'
                    })
              } else if (response == 1) {
                // console.log('1111111111111111');
                  // alert('Formato de imagen incorrecto. Formatos admitidos: pjpeg, jpeg, png, gif.');
                  Swal.fire({
                      icon: 'error',
                      title: 'Formato de imagen incorrecto',
                      text: 'Formatos admitidos: pjpeg, jpeg, png, gif'
                      // footer: '<a href>Why do I have this issue?</a>'
                    })
              } else if (response == 0) {
                // console.log('00000000000');
                  // alert('Hubo un problema con la operación, pruebe de nuevo.');
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Hubo un problema con la operación, pruebe de nuevo'
                      // footer: '<a href>Why do I have this issue?</a>'
                    })
              } else if (response != 0 || response != 1 || response != 2) {
                // console.log('pasaxxxxxxxxxxxxxxxxxx');
                  $(".avatar").attr("src", response);
                  // $(".avatarNav").attr("src", response);
                  // let avatarNav = document.getElementById('avatarNav');
                  // console.log('avatarnav',avatarNav); //null
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
