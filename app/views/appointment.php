<?php require VIEWS_PATH . '/partials/breadcrumb.php'; ?>

<div class="container-fluid appointment py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center justify-content-center">
            <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                <div class="appointment-form rounded p-5">
                    <p class="fs-4 text-uppercase text-primary">Reserva tu cita</p>
                    <h1 class="display-5 mb-4">Formulario de cita</h1>

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
                            <div class="col-xl-6">
                                <select name="service_id" class="form-select py-3 border-primary bg-transparent">
                                    <option value="">Servicio de interés</option>
                                    <?php foreach ($services as $service): ?>
                                        <option value="<?= (int)$service['id'] ?>"><?= e($service['title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-primary bg-transparent text-white" name="message" cols="30" rows="5" placeholder="Escribir comentarios"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary text-white w-100 py-3 px-5">RESERVAR CITA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
