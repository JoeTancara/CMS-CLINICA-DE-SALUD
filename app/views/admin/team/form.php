<h2 class="mb-4"><?= $item ? 'Editar miembro del equipo' : 'Nuevo miembro del equipo' ?></h2>
<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/team/store') ?>" enctype="multipart/form-data">
        <?php if ($item): ?>
            <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
            <input type="hidden" name="current_image" value="<?= e($item['image']) ?>">
        <?php endif; ?>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required value="<?= e($item['name'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Rol / especialidad</label>
                <input type="text" name="role" class="form-control" value="<?= e($item['role'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Foto</label>
                <input type="file" name="image" class="form-control">
                <?php if (!empty($item['image'])): ?><img src="<?= image_url($item['image']) ?>" class="thumb mt-2"><?php endif; ?>
            </div>
            <div class="col-md-6">
                <label class="form-label">Orden</label>
                <input type="number" name="sort_order" class="form-control" value="<?= (int)($item['sort_order'] ?? 0) ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Descripción</label>
                <textarea name="description" class="form-control" rows="3"><?= e($item['description'] ?? '') ?></textarea>
            </div>
            <div class="col-md-3">
                <label class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="<?= e($item['facebook'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Twitter</label>
                <input type="text" name="twitter" class="form-control" value="<?= e($item['twitter'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="<?= e($item['instagram'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" value="<?= e($item['linkedin'] ?? '') ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="status" <?= (!$item || $item['status']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status">Visible</label>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('/admin/team') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
