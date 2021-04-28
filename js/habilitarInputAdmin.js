
var adminPaciente = document.getElementById('rolNuevoUsuarioPaciente');
var adminProfesional = document.getElementById('rolNuevoUsuarioProfesional');
var adminDatosProfesional = document.getElementById('nuevoUsuarioDatosProfesional');
adminDatosProfesional.style.visibility = "hidden";

function habilitarInput() {
  if (adminProfesional.checked) {
    adminDatosProfesional.style.visibility = "visible";
  } else {
    adminDatosProfesional.style.visibility = "hidden";
  }
}

adminPaciente.addEventListener('change', habilitarInput);
adminProfesional.addEventListener('change', habilitarInput);
