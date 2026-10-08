<?php
/** @var array $settings */
$settings = $settings ?? Setting::allAsArray();
$currentRoute = $currentRoute ?? '';
$pageTitle = $pageTitle ?? ($settings['site_name'] ?? 'Terapia');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title><?= e($pageTitle) ?> - <?= e($settings['site_tagline'] ?? 'SALUD MENTAL') ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= asset('lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/style.css') ?>" rel="stylesheet">
</head>

<body>

    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Cargando...</span>
        </div>
    </div>

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <a href="#" class="text-light me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i><?= e($settings['address'] ?? '') ?></a>
                    <a href="tel:<?= e($settings['phone'] ?? '') ?>" class="text-light me-4"><i class="fas fa-phone-alt text-primary me-2"></i><?= e($settings['phone'] ?? '') ?></a>
                    <a href="mailto:<?= e($settings['email'] ?? '') ?>" class="text-light me-0"><i class="fas fa-envelope text-primary me-2"></i><?= e($settings['email'] ?? '') ?></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="<?= e($settings['facebook'] ?? '#') ?>" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?= e($settings['twitter'] ?? '#') ?>" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-twitter"></i></a>
                    <a href="<?= e($settings['instagram'] ?? '#') ?>" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-instagram"></i></a>
                    <a href="<?= e($settings['linkedin'] ?? '#') ?>" class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="<?= base_url('/') ?>" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fas fa-star-of-life me-3"></i><?= e($settings['site_name'] ?? 'Terapia') ?></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url('/') ?>" class="nav-item nav-link <?= $currentRoute === 'home' ? 'active' : '' ?>">Principal</a>
                    <a href="<?= base_url('/sobre-nosotros') ?>" class="nav-item nav-link <?= $currentRoute === 'about' ? 'active' : '' ?>">Información</a>
                    <a href="<?= base_url('/servicios') ?>" class="nav-item nav-link <?= $currentRoute === 'services' ? 'active' : '' ?>">Servicios</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Página</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url('/cita') ?>" class="dropdown-item">Cita</a>
                            <a href="<?= base_url('/caracteristicas') ?>" class="dropdown-item">Características</a>
                            <a href="<?= base_url('/equipo') ?>" class="dropdown-item">Nuestro equipo</a>
                            <a href="<?= base_url('/motivacion') ?>" class="dropdown-item">Motivación</a>
                        </div>
                    </div>
                    <a href="<?= base_url('/contacto') ?>" class="nav-item nav-link <?= $currentRoute === 'contact' ? 'active' : '' ?>">Contacta con nosotros</a>
                </div>
                <a href="<?= base_url('/contacto') ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Reserva tu cita</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
