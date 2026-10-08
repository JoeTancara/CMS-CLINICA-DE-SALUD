<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid feature py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-3 mb-4">Nuestras características</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($features as $feature): ?>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas <?= e($feature['icon']) ?> fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4"><?= e($feature['title']) ?></h5>
                                <p class="mb-0"><?= e($feature['description']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
