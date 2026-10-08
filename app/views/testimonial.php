<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid testimonial py-5 wow zoomInDown" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title mb-5">
            <h1 class="display-3 mb-4 text-white">Palabras que Inspiran Bienestar Mental</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-item">
                    <div class="testimonial-inner p-5">
                        <div class="testimonial-inner-img mb-4">
                            <img src="<?= image_url($testimonial['image'], 'img/testimonial-img.jpg') ?>" class="img-fluid rounded-circle" alt="">
                        </div>
                        <p class="text-white fs-7">&quot;<?= e($testimonial['quote']) ?>&quot;</p>
                        <div class="text-center">
                            <h5 class="mb-2"><?= e($testimonial['name'] ?? '') ?></h5>
                            <p class="mb-2 text-white-50"><?= e($testimonial['role'] ?? '') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
