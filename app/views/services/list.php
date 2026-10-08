<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h1 class="display-3 mb-4">Nuestros servicios</h1>
            <p class="mb-0">Conoce las áreas en las que te acompañamos para recuperar tu bienestar emocional.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($services as $service): ?>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded">
                        <div class="service-img rounded-top">
                            <img src="<?= image_url($service['image']) ?>" class="img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="service-content rounded-bottom bg-light p-4">
                            <div class="service-content-inner">
                                <h5 class="mb-4"><?= e($service['title']) ?></h5>
                                <p class="mb-4"><?= e(excerpt($service['short_description'] ?? '', 180)) ?></p>
                                <a href="<?= base_url('/servicio/' . $service['slug']) ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
