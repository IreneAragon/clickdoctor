<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';
?>


<div class="mt-5 container">
    <div class="mt-5">  
        <h1>Crea una conversación nueva con un profesional</h1>

        <form class="mt-5" action="generarInforme.php" method="post">

            <div class="form-row mb-2"> 
                <div class="col-sm-6 col-12">
                    <!-- Especialidad -->
                    <label for="newEsp" class="form-label ml-2">Especialidad</label>
                    <input type="text" id="newEsp" name="newEsp" class="form-control" placeholder="Asunto" required>
                </div>
                <div class="col-sm-6 col-12">
                    <!-- Prosesional -->
                    <label for="newProf" class="form-label ml-2">Profesional</label>
                    <input type="text" id="newProf" name="newProf" class="form-control" placeholder="Nombre profesional" required>
                </div>
            </div>
            <div class="form-row mb-2"> 
                <div class="col-12">
                    <!-- Asunto -->
                    <label for="newConv" class="form-label ml-2">Asunto</label>
                    <input type="text" id="newConv" name="newConv" class="form-control" placeholder="Asunto" required>
                </div>
            </div>
            <div class="form-row mb-2 mt-3">
                <div class="col-12">
                    <!-- Mensaje -->
                    <label for="newMens" class="form-label ml-2">Mensaje</label>
                    <textarea name="newMens" class="form-control" rows="3" placeholder="Escribe lo que quieras" required></textarea>
                </div>
            </div>
        
        </form>
    </div>
</div>