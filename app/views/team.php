<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-3 mb-4">Nuestro equipo</h1>
            <p class="mb-0">Especialistas comprometidos con tu bienestar emocional.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <?php foreach ($team as $member): ?>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <div class="team-img rounded-top h-100">
                            <img src="<?= image_url($member['image']) ?>" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon d-flex justify-content-center">
                                <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="<?= e($member['facebook'] ?: '#') ?>"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="<?= e($member['twitter'] ?: '#') ?>"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="<?= e($member['instagram'] ?: '#') ?>"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary text-white rounded-circle mx-1" href="<?= e($member['linkedin'] ?: '#') ?>"><i class="fab fa-linkedin-in"></i></a>
                            </div>
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
