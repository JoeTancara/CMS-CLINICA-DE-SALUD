<h2 class="mb-4">Mensajes y solicitudes de cita</h2>
<div class="card p-3">
    <table class="table align-middle">
        <thead><tr><th></th><th>Tipo</th><th>Nombre</th><th>Contacto</th><th>Servicio</th><th>Fecha</th><th></th></tr></thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr class="<?= $item['is_read'] ? '' : 'fw-bold' ?>">
                    <td><?= $item['is_read'] ? '' : '<span class="badge bg-danger">Nuevo</span>' ?></td>
                    <td><span class="badge bg-<?= $item['type'] === 'cita' ? 'primary' : 'secondary' ?>"><?= e($item['type']) ?></span></td>
                    <td><?= e($item['name']) ?></td>
                    <td><?= e($item['email'] ?: $item['phone']) ?></td>
                    <td><?= e($item['service_title'] ?? '') ?></td>
                    <td><?= e($item['created_at']) ?></td>
                    <td class="text-end">
                        <a href="<?= base_url('/admin/messages/' . $item['id']) ?>" class="btn btn-sm btn-outline-primary">Ver</a>
                        <a href="<?= base_url('/admin/messages/delete/' . $item['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($items)): ?><tr><td colspan="7" class="text-muted">No hay mensajes todavía.</td></tr><?php endif; ?>
        </tbody>
    </table>
</div>
