<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';
?>
<div class="container pt-5">
    <div class="row">
        <div class="col">
            <h2 class="pt-5">Mis Informes</h2>

            <div id="msgNoInformesPaciente" class="alert alert-primary" role="alert">
                Aún no tienes informes.
            </div>

            <div class="container mt-5">
                <table class="table table-sm table-hover" id="tablaInformesPaciente">
                    <thead>
                        <tr>
                            <th class="min-w" scope="col">Fecha</th>
                            <th class="min-w" scope="col">Especialidad</th>
                            <th class="min-w" scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody id="listaInformesPaciente">
                        <!-- tr obtenidas por ajax en listarInformes.js -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="js/listarInformes.js" charset="utf-8"></script>
<script src="../js/utils.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
