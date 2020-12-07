
var paciente = document.getElementById('paciente');
var profesional = document.getElementById('profesional');
var datosProfesional = document.getElementById('datosProfesional');

// Dependiendo de si el usuario es "paciente" o "profesional" la función
// muestra u oculta dos inputs que deben rellenar solamente los profesionales
function habilitarInput() {
  if (profesional.checked) {
    datosProfesional.style.visibility = "visible";
  } else {
    datosProfesional.style.visibility = "hidden";
  }
}

paciente.addEventListener('change', habilitarInput);
profesional.addEventListener('change', habilitarInput);
