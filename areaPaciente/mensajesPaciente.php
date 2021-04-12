<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';
?>

<div class="container pt-5">
    <div class="row">
        <div class="col">
            <h2 class="pt-5">MENSAJES</h2>

            <a href="nuevaConversacion.php " class="btn btn-primary"> Crear nueva conversación </a>

            <div class="container mt-5">
                <h3>Mis conversaciones</h3>

                <table class="table table-sm table-hover" id="x">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Profesional</th>
                            <th scope="col">Asunto</th>
                            <th scope="col">Abrir</th>
                        </tr>
                    </thead>
                    <tbody id="listaConversacionesPaciente">
                        <!-- TODO:  tr obtenidas por ajax -->
                        <!-- <tr>
                            <td>2021/15/03</td>
                            <td>Dr. Nacho MArtín</td>
                            <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver <i class="fa fa-eye iconoOjo"></i></button> </td>
                        </tr>
                        <tr>
                            <td>2021/15/03</td>
                            <td>Dr. Nacho MArtín</td>
                            <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver <i class="fa fa-eye iconoOjo"></i></button> </td>
                        </tr>
                        <tr>
                            <td>2021/15/03</td>
                            <td>Dr. Nacho MArtín</td>
                            <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver <i class="fa fa-eye iconoOjo"></i></button> </td>
                        </tr> -->

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script src="mensajeria/js/listarConversacionesPaciente.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
