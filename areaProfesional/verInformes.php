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

     <table class="table table-sm table-hover" id="tablaProfInformes">
         <thead>
             <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Paciente</th>
                 <th scope="col">Ver</th>
             </tr>
         </thead>
         <tbody id="listaProfInformes">
             <!-- TODO: tr obtenidas por ajax -->
             <!-- <form class="" action="abrirInforme.php" method="post"> -->
                 <tr>
                     <td>2021/15/03</td>
                     <td>Irene Aragón Gómez</td>
                     <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver Informe <i class="fa fa-eye iconoOjo"></i></button> </td>
                </tr>
                <tr>
                    <td>2021/15/03</td>
                    <td>Irene Aragón Gómez</td>
                    <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver Informe <i class="fa fa-eye iconoOjo"></i></button> </td>
               </tr>
               <tr>
                   <td>2021/15/03</td>
                   <td>Irene Aragón Gómez</td>
                   <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver Informe <i class="fa fa-eye iconoOjo"></i></button> </td>
              </tr>
             <!-- </form> -->

         </tbody>
     </table>
 </div>

<script src="js/listarInformesProfesional.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
