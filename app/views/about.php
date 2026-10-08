<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<!-- About Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-img pb-5 ps-5">
                    <video src="<?= image_url($block['image'] ?? '') ?>" autoplay muted loop width="500" height="500"></video>
                    <div class="about-img-inner"></div>
                </div>
            </div>
            <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                <div class="section-title text-start mb-5">
                    <h4 class="sub-title pe-3 mb-0"><?= e($block['subtitle']) ?></h4>
                    <h1 class="display-3 mb-4"><?= e($block['title']) ?></h1>
                    <p class="mb-4"><?= e($block['body']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Team Start -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-3 mb-4">Especialistas en Salud Mental</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($team as $member): ?>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <div class="team-img rounded-top h-100">
                            <img src="<?= image_url($member['image']) ?>" class="img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="team-content text-center border border-primary border-top-0 rounded-bottom p-4">
                            <h5><?= e($member['role']) ?></h5>
                            <p class="mb-0"><?= e($member['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Feature Start -->
<div class="container-fluid feature py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-3 mb-4">Por qué elegirnos</h1>
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
<!-- Feature End -->
