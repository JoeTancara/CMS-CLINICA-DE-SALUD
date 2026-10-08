<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style mb-4">
                <h4 class="sub-title text-white px-3 mb-0"><?= e($block['title'] ?? 'Contáctanos') ?></h4>
            </div>
            <p class="mb-0 text-black-50"><?= e($block['body'] ?? '') ?></p>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-5 col-xl-5 contact-form wow fadeInLeft" data-wow-delay="0.1s">
                <h2 class="display-5 text-white mb-2"><?= e($block['subtitle'] ?? 'SALUD MENTAL') ?></h2>

                <?php $flash = get_flash(); ?>
                <?php if (!empty($flash['success'])): ?>
                    <div class="alert alert-success"><?= e($flash['success']) ?></div>
                <?php endif; ?>
                <?php if (!empty($flash['error'])): ?>
                    <div class="alert alert-danger"><?= e($flash['error']) ?></div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('/contacto') ?>">
                    <div class="row g-3">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="name" required class="form-control bg-transparent border border-white" id="name" placeholder="Tu nombre">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control bg-transparent border border-white" id="email" placeholder="Tu email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" name="phone" class="form-control bg-transparent border border-white" id="phone" placeholder="Teléfono">
                                <label for="phone">Teléfono</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <select name="service_id" class="form-select bg-transparent border border-white" id="project">
                                    <option value="">Motivo de tu consulta</option>
                                    <?php foreach ($services as $service): ?>
                                        <option value="<?= (int)$service['id'] ?>"><?= e($service['title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="project">Motivo de tu consulta</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="subject" class="form-control bg-transparent border border-white" id="subject" placeholder="Asunto">
                                <label for="subject">Asunto</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-transparent border border-white" name="message" placeholder="Escribe tu mensaje" id="message" style="height: 160px"></textarea>
                                <label for="message">Mensaje</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-light text-primary w-100 py-3">Enviar consulta</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-2 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-transparent rounded">
                    <div class="d-flex flex-column align-items-center text-center mb-4">
                        <div class="bg-white d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="fa fa-map-marker-alt fa-2x text-primary"></i></div>
                        <h4 class="text-dark">Dirección</h4>
                        <p class="mb-0 text-white"><?= e($settings['address'] ?? '') ?></p>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center mb-4">
                        <div class="bg-white d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="fa fa-phone-alt fa-2x text-primary"></i></div>
                        <h4 class="text-dark">Teléfono</h4>
                        <p class="mb-0 text-white"><?= e($settings['phone'] ?? '') ?></p>
                        <?php if (!empty($settings['phone_2'])): ?>
                            <p class="mb-0 text-white"><?= e($settings['phone_2']) ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="bg-white d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="fa fa-envelope-open fa-2x text-primary"></i></div>
                        <h4 class="text-dark">Email</h4>
                        <p class="mb-0 text-white"><?= e($settings['email'] ?? '') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-xl-5 wow fadeInRight" data-wow-delay="0.3s">
                <div class="d-flex justify-content-center mb-4">
                    <a class="btn btn-lg-square btn-light rounded-circle mx-2" href="<?= e($settings['facebook'] ?? '#') ?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg-square btn-light rounded-circle mx-2" href="<?= e($settings['twitter'] ?? '#') ?>"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg-square btn-light rounded-circle mx-2" href="<?= e($settings['instagram'] ?? '#') ?>"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg-square btn-light rounded-circle mx-2" href="<?= e($settings['linkedin'] ?? '#') ?>"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="rounded h-100">
                    <iframe class="rounded w-100" style="height: 400px;" src="<?= e($settings['map_embed_url'] ?? '') ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
