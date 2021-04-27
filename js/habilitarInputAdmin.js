
var AdminPaciente = document.getElementById('RolNuevoUsuarioPaciente');
var AdminProfesional = document.getElementById('RolNuevoUsuarioProfesional');
var AdminDatosProfesional = document.getElementById('NuevoUsuarioDatosProfesional');
AdminDatosProfesional.style.visibility = "hidden";

function habilitarInput() {
  if (AdminProfesional.checked) {
    AdminDatosProfesional.style.visibility = "visible";
  } else {
    AdminDatosProfesional.style.visibility = "hidden";
  }
}

AdminPaciente.addEventListener('change', habilitarInput);
AdminProfesional.addEventListener('change', habilitarInput);
