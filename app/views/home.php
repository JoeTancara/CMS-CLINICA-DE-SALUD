<?php
/** @var array $slides, $services, $features, $team, $testimonials, $blocks, $settings */
?>
<!-- Carousel Start -->
<div class="container-fluid position-relative p-0">
    <div class="header-carousel owl-carousel">
        <?php foreach ($slides as $slide): ?>
            <div class="header-carousel-item">
                <img src="<?= image_url($slide['image']) ?>" class="img-fluid w-100" alt="">
                <div class="carousel-caption">
                    <div class="carousel-caption-content p-3">
                        <?php if (!empty($slide['subtitle'])): ?>
                            <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"><?= e($slide['subtitle']) ?></h5>
                        <?php endif; ?>
                        <h1 class="display-1 text-capitalize text-white mb-4"><?= e($slide['title']) ?></h1>
                        <p class="mb-5 fs-5">&ldquo;<?= e($slide['description']) ?>&rdquo;</p>
                        <?php if (!empty($slide['button_text'])): ?>
                            <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="<?= base_url($slide['button_link'] ?: '/contacto') ?>"><?= e($slide['button_text']) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Carousel End -->


<!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0"><?= e($blocks['home_services']['subtitle']) ?></h4>
            </div>
            <h1 class="display-3 mb-4"><?= e($blocks['home_services']['title']) ?></h1>
            <p class="mb-0"><?= e($blocks['home_services']['body']) ?></p>
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
<!-- Services End -->


<!-- Feature Start -->
<div class="container-fluid feature py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0"><?= e($blocks['home_features']['subtitle']) ?></h4>
            </div>
            <h1 class="display-3 mb-4"><?= e($blocks['home_features']['title']) ?></h1>
            <p class="mb-0"><?= e($blocks['home_features']['body']) ?></p>
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


<!-- Book Appointment Start -->
<div class="container-fluid appointment py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2">
                <div class="section-title text-start">
                    <h4 class="sub-title pe-3 mb-0"><?= e($blocks['home_appointment']['subtitle']) ?></h4>
                    <h1 class="display-4 mb-4"><?= e($blocks['home_appointment']['title']) ?></h1>
                    <p class="mb-4"><?= e($blocks['home_appointment']['body']) ?></p>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4">
                                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i> Gestión del Estrés</h5>
                                    <p class="mb-0">Aprende a manejar situaciones de presión y a mantener una mente más calmada y enfocada.</p>
                                </div>
                                <div class="mb-4">
                                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i> Relajación y Bienestar</h5>
                                    <p class="mb-0">Técnicas de relajación para reducir la tensión emocional y mejorar tu estado de ánimo.</p>
                                </div>
                                <div class="text-start mb-4">
                                    <a href="<?= base_url('/servicios') ?>" class="btn btn-primary rounded-pill text-white py-3 px-5">Más detalles</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="video h-100">
                                <img src="<?= image_url($blocks['home_appointment']['image'] ?? '') ?>" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                <button type="button" class="btn btn-primary rounded-pill">
                                    <a href="<?= e($settings['video_url'] ?? '#') ?>" target="_blank" style="color:white; text-decoration:none;">Ver video</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="appointment-form rounded p-5">
                    <p class="fs-4 text-uppercase text-primary">Contáctanos</p>
                    <h1 class="display-5 mb-4">Formulario de contacto</h1>

                    <?php $flash = get_flash(); ?>
                    <?php if (!empty($flash['success'])): ?>
                        <div class="alert alert-success"><?= e($flash['success']) ?></div>
                    <?php endif; ?>
                    <?php if (!empty($flash['error'])): ?>
                        <div class="alert alert-danger"><?= e($flash['error']) ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('/cita') ?>">
                        <div class="row gy-3 gx-4">
                            <div class="col-xl-6">
                                <input type="text" name="name" required class="form-control py-3 border-primary bg-transparent text-white" placeholder="Nombre">
                            </div>
                            <div class="col-xl-6">
                                <input type="email" name="email" class="form-control py-3 border-primary bg-transparent text-white" placeholder="Email">
                            </div>
                            <div class="col-xl-6">
                                <input type="text" name="phone" class="form-control py-3 border-primary bg-transparent" placeholder="Teléfono">
                            </div>
                            <div class="col-xl-6">
                                <select name="gender" class="form-select py-3 border-primary bg-transparent">
                                    <option selected value="">Género</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <input type="date" name="birthdate" class="form-control py-3 border-primary bg-transparent">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-primary bg-transparent text-white" name="message" cols="30" rows="5" placeholder="Escribir comentarios"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary text-white w-100 py-3 px-5">ENVIAR AHORA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Book Appointment End -->


<!-- Team Start -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0"><?= e($blocks['home_team']['subtitle']) ?></h4>
            </div>
            <h1 class="display-3 mb-4"><?= e($blocks['home_team']['title']) ?></h1>
            <p class="mb-0"><?= e($blocks['home_team']['body']) ?></p>
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
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5 wow zoomInDown" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title mb-5">
            <div class="sub-style">
                <h4 class="sub-title text-white px-3 mb-0"><?= e($blocks['home_testimonial']['subtitle']) ?></h4>
            </div>
            <h1 class="display-3 mb-4"><?= e($blocks['home_testimonial']['title']) ?></h1>
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
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->
