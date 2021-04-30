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

 <div class="container mt-5">
     <h1 class="mt-5">Informes creados por mi</h1>

     <div id="msgNoInformes" class="alert alert-primary" role="alert">
         Aún no ha creado ningún informe.
     </div>

     <table class="table table-sm table-hover" id="tablaProfInformes">
         <thead>
             <tr>
                 <th class="min-w" scope="col">Fecha</th>
                 <th class="min-w" scope="col">Paciente</th>
                 <th class="min-w" scope="col">Ver</th>
             </tr>
         </thead>
         <tbody id="listaProfInformes">
             <!-- tr obtenidas por ajax en listarInformesProfesional.js -->
         </tbody>
     </table>
 </div>

<script src="js/listarInformesProfesional.js" charset="utf-8"></script>
<script src="../js/utils.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
