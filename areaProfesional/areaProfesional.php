<?php
include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';
// var_dump($_SESSION);
?>

<!-- TODO:
        - quitar onclick, usar id y js getelementbyID
-->
<!-- CONTENIDO -->
<div id="contenidoPrincipal" class="container mt-5">
    <h2 class="pt-4">Paciente: Nombre Apellido</h2>
    <!-- TODO: meter targetitas tipo info covid o cosas sanitarias -->
    <!-- TARJETAS -->
    <div class="row">
        <!-- TARJETA 1 -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-4">
            <div class="card myCard">
                <img src="../img/logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <!-- TARJETA 2 -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-4">
            <div class="card myCard">
                <img src="../img/logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <!-- TARJETA 3 -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-4">
            <div class="card myCard">
                <img src="../img/logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Párrafos de ejemplo -->
    <div class="m-5">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec leo eget quam venenatis bibendum eu id risus.
            Aenean neque sem, volutpat in fermentum ut, eleifend ut libero. Cras nec luctus massa. Suspendisse laoreet venenatis mattis.
            Duis ornare, nibh id placerat facilisis, lacus enim dignissim ante, non consequat eros lectus non odio. Nulla nec orci sapien.
            Integer velit ligula, sagittis non scelerisque et, condimentum et ipsum. Phasellus aliquet lacus non tellus sodales, vitae
            ullamcorper nisl porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            Praesent hendrerit sapien in leo fringilla finibus. Suspendisse accumsan iaculis mi, quis venenatis magna. Quisque et quam
            pharetra, placerat ex sit amet, porta magna. Curabitur fermentum pellentesque nibh vitae tincidunt. Maecenas nisl leo, sagittis
            eu massa tincidunt, lobortis consequat elit. Nullam laoreet tempor neque, sit amet commodo sem suscipit ut. Aenean metus turpis,
            egestas non dictum eget, convallis quis felis.

            Nullam blandit purus et volutpat tempor. Nam varius et eros quis malesuada. Aliquam viverra mollis mi, et euismod magna luctus in.
            Quisque sodales nec leo eget tristique. Nullam purus nulla, efficitur at ipsum non, posuere rhoncus lacus. Phasellus non
            condimentum diam. Morbi consequat pretium cursus. Morbi fringilla accumsan scelerisque. Nam fermentum, massa eu egestas imperdiet,
            quam nisl luctus tellus, ac fringilla odio nunc sed ex. Suspendisse lorem quam, cursus viverra lorem sed, ultricies gravida orci.
            Nulla eget diam in enim lacinia vulputate. Pellentesque massa risus, pulvinar vel quam rhoncus, blandit dignissim erat. Nulla aliquam,
            nisl eu aliquam molestie, nulla massa cursus nisl, et tempus mauris diam ornare elit. Nullam eget volutpat nulla. Donec varius neque
            ut lorem tincidunt sodales. In arcu est, dapibus in ligula nec, euismod vehicula nulla.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec leo eget quam venenatis bibendum eu id risus.
            Aenean neque sem, volutpat in fermentum ut, eleifend ut libero. Cras nec luctus massa. Suspendisse laoreet venenatis mattis.
            Duis ornare, nibh id placerat facilisis, lacus enim dignissim ante, non consequat eros lectus non odio. Nulla nec orci sapien.
            Integer velit ligula, sagittis non scelerisque et, condimentum et ipsum. Phasellus aliquet lacus non tellus sodales, vitae
            ullamcorper nisl porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            Praesent hendrerit sapien in leo fringilla finibus. Suspendisse accumsan iaculis mi, quis venenatis magna. Quisque et quam
            pharetra, placerat ex sit amet, porta magna. Curabitur fermentum pellentesque nibh vitae tincidunt. Maecenas nisl leo, sagittis
            eu massa tincidunt, lobortis consequat elit. Nullam laoreet tempor neque, sit amet commodo sem suscipit ut. Aenean metus turpis,
            egestas non dictum eget, convallis quis felis.

            Nullam blandit purus et volutpat tempor. Nam varius et eros quis malesuada. Aliquam viverra mollis mi, et euismod magna luctus in.
            Quisque sodales nec leo eget tristique. Nullam purus nulla, efficitur at ipsum non, posuere rhoncus lacus. Phasellus non
            condimentum diam. Morbi consequat pretium cursus. Morbi fringilla accumsan scelerisque. Nam fermentum, massa eu egestas imperdiet,
            quam nisl luctus tellus, ac fringilla odio nunc sed ex. Suspendisse lorem quam, cursus viverra lorem sed, ultricies gravida orci.
            Nulla eget diam in enim lacinia vulputate. Pellentesque massa risus, pulvinar vel quam rhoncus, blandit dignissim erat. Nulla aliquam,
            nisl eu aliquam molestie, nulla massa cursus nisl, et tempus mauris diam ornare elit. Nullam eget volutpat nulla. Donec varius neque
            ut lorem tincidunt sodales. In arcu est, dapibus in ligula nec, euismod vehicula nulla.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec leo eget quam venenatis bibendum eu id risus.
            Aenean neque sem, volutpat in fermentum ut, eleifend ut libero. Cras nec luctus massa. Suspendisse laoreet venenatis mattis.
            Duis ornare, nibh id placerat facilisis, lacus enim dignissim ante, non consequat eros lectus non odio. Nulla nec orci sapien.
            Integer velit ligula, sagittis non scelerisque et, condimentum et ipsum. Phasellus aliquet lacus non tellus sodales, vitae
            ullamcorper nisl porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            Praesent hendrerit sapien in leo fringilla finibus. Suspendisse accumsan iaculis mi, quis venenatis magna. Quisque et quam
            pharetra, placerat ex sit amet, porta magna. Curabitur fermentum pellentesque nibh vitae tincidunt. Maecenas nisl leo, sagittis
            eu massa tincidunt, lobortis consequat elit. Nullam laoreet tempor neque, sit amet commodo sem suscipit ut. Aenean metus turpis,
            egestas non dictum eget, convallis quis felis.

            Nullam blandit purus et volutpat tempor. Nam varius et eros quis malesuada. Aliquam viverra mollis mi, et euismod magna luctus in.
            Quisque sodales nec leo eget tristique. Nullam purus nulla, efficitur at ipsum non, posuere rhoncus lacus. Phasellus non
            condimentum diam. Morbi consequat pretium cursus. Morbi fringilla accumsan scelerisque. Nam fermentum, massa eu egestas imperdiet,
            quam nisl luctus tellus, ac fringilla odio nunc sed ex. Suspendisse lorem quam, cursus viverra lorem sed, ultricies gravida orci.
            Nulla eget diam in enim lacinia vulputate. Pellentesque massa risus, pulvinar vel quam rhoncus, blandit dignissim erat. Nulla aliquam,
            nisl eu aliquam molestie, nulla massa cursus nisl, et tempus mauris diam ornare elit. Nullam eget volutpat nulla. Donec varius neque
            ut lorem tincidunt sodales. In arcu est, dapibus in ligula nec, euismod vehicula nulla.
        </p>
    </div>
</div> <!-- /main -->

<?php
include_once '../include/footer.html';
?>
