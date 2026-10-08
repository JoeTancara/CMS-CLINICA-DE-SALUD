<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="m-0">Servicios</h2>
    <a href="<?= base_url('/admin/services/create') ?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Nuevo servicio</a>
</div>

<div class="card p-3">
    <table class="table align-middle">
        <thead>
            <tr><th>Imagen</th><th>Título</th><th>Slug</th><th>Orden</th><th>Estado</th><th></th></tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><img src="<?= image_url($item['image']) ?>" class="thumb"></td>
                    <td><?= e($item['title']) ?></td>
                    <td><code><?= e($item['slug']) ?></code></td>
                    <td><?= (int)$item['sort_order'] ?></td>
                    <td><?= $item['status'] ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-secondary">Oculto</span>' ?></td>
                    <td class="text-end">
                        <a href="<?= base_url('/admin/services/edit/' . $item['id']) ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                        <a href="<?= base_url('/admin/services/delete/' . $item['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar este servicio?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($items)): ?>
                <tr><td colspan="6" class="text-muted">No hay servicios registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
