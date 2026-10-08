<?php
/** Variables esperadas: $breadcrumbTitle */
?>
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h1 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s"><?= e($breadcrumbTitle ?? '') ?></h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Principal</a></li>
            <li class="breadcrumb-item active text-primary"><?= e($breadcrumbTitle ?? '') ?></li>
        </ol>
    </div>
</div>
