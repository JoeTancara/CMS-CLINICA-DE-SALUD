<?php $flash = get_flash(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Iniciar sesión - Panel de administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #1f2937; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { max-width: 380px; width: 100%; }
    </style>
</head>
<body>
    <div class="card login-card p-4 shadow">
        <h4 class="mb-3 text-center">Panel de administración</h4>
        <?php if (!empty($flash['error'])): ?>
            <div class="alert alert-danger"><?= e($flash['error']) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= base_url('/admin/login') ?>">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>
</body>
</html>
