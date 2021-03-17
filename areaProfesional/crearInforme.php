<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}
include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';


 ?>

<body>
    <div class="container mt-5">
        <!-- Muestra los mensajes de error o de éxito en caso de haberlos -->
        <div class="alert-danger mt-5 text-center temporizador error">
          <?php
            if(isset($msgError)){
              echo $msgError;
            }
          ?>
        </div>
        <div class="alert-success text-center temporizador exito">
          <?php
            if(isset($msgExito)){
              echo $msgExito;
            }
          ?>
        </div>
        <form class="mt-5" action="generarInforme.php" method="post">
            <p class="h4 mb-4 mt-5">Introduce los datos del paciente</p>
            <div class="form-row mb-2">
                <div class="col-sm-6 col-12">
                    <!-- Nombre -->
                    <label for="infNombre" class="form-label ml-2">Nombre</label>
                    <input type="text" id="infNombre" name="infNombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col-sm-6 col-12">
                    <!-- Apellidos -->
                    <label for="infApellidos" class="form-label ml-2">Apellidos</label>
                    <input type="text" id="infApellidos" name="infApellidos" class="form-control" placeholder="Apellidos" required>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-sm-6 col-12">
                    <!-- DNI paciente -->
                    <label for="infDni" class="form-label ml-2">DNI</label>
                    <input type="text" id="infDni" name="infDni" class="form-control" placeholder="12345678X" required>
                </div>
                <div class="col-sm-6 col-12">
                    <!-- Fecha de nacimiento -->
                    <label for="infFnac" class="form-label ml-2">Fecha de Nacimiento</label>
                    <input type="date" id="infFnac" name="infFnac" class="form-control" required>
                </div>
            </div>
            <p class="h4 mb-4 mt-5">Introduce los datos de la consulta</p>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Motivo -->
                    <label for="infMotivo" class="form-label ml-2">Motivo de la consulta</label>
                    <textarea name="infMotivo" class="form-control" rows="3" placeholder="Descripción de la consulta" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Antecedentes -->
                    <label for="infAntecedentes" class="form-label ml-2">Antecedentes</label>
                    <textarea name="infAntecedentes" class="form-control" rows="3" placeholder="Antecedentes del paciente" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Alergias -->
                    <label for="infAlergias" class="form-label ml-2">Alergias</label>
                    <textarea name="infAlergias" class="form-control" rows="3" placeholder="Alergias conocidas" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Anamnesis -->
                    <label for="infAnamnesis" class="form-label ml-2">Anamnesis</label>
                    <textarea name="infAnamnesis" class="form-control" rows="3" placeholder="Breve historia clínica del paciente" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Exploración -->
                    <label for="infExploración" class="form-label ml-2">Exploración</label>
                    <textarea name="infExploración" class="form-control" rows="3" placeholder="Datos relevantes de la exploración" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Diagnóstico -->
                    <label for="infDiagnostico" class="form-label ml-2">Diagnóstico</label>
                    <textarea name="infDiagnostico" class="form-control" rows="3" placeholder="Diagnóstico del paciente tras evaluación" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Prescripción -->
                    <label for="infPrescripcion" class="form-label ml-2">Prescripción</label>
                    <textarea name="infPrescripcion" class="form-control" rows="3" placeholder="Medicación y toma" required></textarea>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Observaciones -->
                    <label for="infObservaciones" class="form-label ml-2">Observaciones</label>
                    <textarea name="infObservaciones" class="form-control" rows="3" placeholder="Anotaciones extra"></textarea>
                </div>
            </div>

            <input type="submit" id="infSubmit" name="infSubmit" value="Guardar Informe" class="btn btn-info my-4 btn-block">
        </form>
    </div>
</body>

<script src="js/ocultarDiv.js" charset="utf-8"></script>
 <?php
 include_once '../include/footer.html';
