<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid depression py-5">
    <div class="container py-5">
        <?php
        /**
         * El campo "content" viene desde el panel de administración
         * y contiene el HTML de la sección (títulos, listas, notas).
         * Se guarda con htmlspecialchars desactivado a propósito
         * porque el propio admin lo redacta desde el panel (no el público).
         */
        echo $service['content'];
        ?>
    </div>
</div>
