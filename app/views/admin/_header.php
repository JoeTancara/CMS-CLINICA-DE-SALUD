<?php
/** @var array $settings */
$adminName = $_SESSION['admin_name'] ?? 'Administrador';
$flash = get_flash();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Panel de administración - <?= e($settings['site_name'] ?? 'Terapia') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <style>
        body { background: #f4f6f9; }
        .admin-sidebar { min-height: 100vh; background: #1f2937; color: #fff; }
        .admin-sidebar a { color: #cbd5e1; display: block; padding: .6rem 1.2rem; text-decoration: none; }
        .admin-sidebar a:hover, .admin-sidebar a.active { background: #374151; color: #fff; }
        .admin-sidebar .brand { padding: 1.2rem; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #374151; }
        .admin-content { padding: 2rem; }
        .thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 6px; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="admin-sidebar" style="width: 240px;">
        <div class="brand"><i class="fas fa-star-of-life me-2"></i><?= e($settings['site_name'] ?? 'Terapia') ?> Admin</div>
        <a href="<?= base_url('/admin') ?>"><i class="fas fa-gauge me-2"></i>Dashboard</a>
        <a href="<?= base_url('/admin/slides') ?>"><i class="fas fa-images me-2"></i>Slides (portada)</a>
        <a href="<?= base_url('/admin/services') ?>"><i class="fas fa-diagnoses me-2"></i>Servicios</a>
        <a href="<?= base_url('/admin/features') ?>"><i class="fas fa-heart me-2"></i>Características</a>
        <a href="<?= base_url('/admin/team') ?>"><i class="fas fa-users me-2"></i>Equipo</a>
        <a href="<?= base_url('/admin/testimonials') ?>"><i class="fas fa-quote-right me-2"></i>Testimonios</a>
        <a href="<?= base_url('/admin/content-blocks') ?>"><i class="fas fa-align-left me-2"></i>Textos de páginas</a>
        <a href="<?= base_url('/admin/messages') ?>"><i class="fas fa-envelope me-2"></i>Mensajes / Citas</a>
        <a href="<?= base_url('/admin/settings') ?>"><i class="fas fa-gear me-2"></i>Configuración</a>
        <a href="<?= base_url('/admin/logout') ?>" class="mt-3 border-top pt-3"><i class="fas fa-right-from-bracket me-2"></i>Cerrar sesión (<?= e($adminName) ?>)</a>
    </div>
    <div class="flex-fill">
        <div class="admin-content">
            <?php if (!empty($flash['success'])): ?>
                <div class="alert alert-success"><?= e($flash['success']) ?></div>
            <?php endif; ?>
            <?php if (!empty($flash['error'])): ?>
                <div class="alert alert-danger"><?= e($flash['error']) ?></div>
            <?php endif; ?>
