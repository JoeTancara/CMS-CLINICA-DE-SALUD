<h2 class="mb-4">Dashboard</h2>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card p-3">
            <div class="text-muted small">Servicios</div>
            <div class="fs-3 fw-bold"><?= (int)$totalServices ?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <div class="text-muted small">Equipo</div>
            <div class="fs-3 fw-bold"><?= (int)$totalTeam ?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <div class="text-muted small">Testimonios</div>
            <div class="fs-3 fw-bold"><?= (int)$totalTestimonials ?></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <div class="text-muted small">Mensajes sin leer</div>
            <div class="fs-3 fw-bold text-danger"><?= (int)$unreadMessages ?></div>
        </div>
    </div>
</div>

<div class="card p-3">
    <h5 class="mb-3">Últimos mensajes / citas</h5>
    <table class="table table-sm">
        <thead>
            <tr><th>Tipo</th><th>Nombre</th><th>Contacto</th><th>Fecha</th><th></th></tr>
        </thead>
        <tbody>
            <?php foreach ($recentMessages as $m): ?>
                <tr>
                    <td><span class="badge bg-<?= $m['type'] === 'cita' ? 'primary' : 'secondary' ?>"><?= e($m['type']) ?></span></td>
                    <td><?= e($m['name']) ?></td>
                    <td><?= e($m['email'] ?: $m['phone']) ?></td>
                    <td><?= e($m['created_at']) ?></td>
                    <td><a href="<?= base_url('/admin/messages/' . $m['id']) ?>" class="btn btn-sm btn-outline-primary">Ver</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($recentMessages)): ?>
                <tr><td colspan="5" class="text-muted">Sin mensajes todavía.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
