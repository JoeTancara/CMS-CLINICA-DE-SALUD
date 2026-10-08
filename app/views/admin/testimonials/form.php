<h2 class="mb-4"><?= $item ? 'Editar testimonio' : 'Nuevo testimonio' ?></h2>
<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/testimonials/store') ?>" enctype="multipart/form-data">
        <?php if ($item): ?>
            <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
            <input type="hidden" name="current_image" value="<?= e($item['image']) ?>">
        <?php endif; ?>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre (opcional)</label>
                <input type="text" name="name" class="form-control" value="<?= e($item['name'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Rol (opcional)</label>
                <input type="text" name="role" class="form-control" value="<?= e($item['role'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Foto (opcional)</label>
                <input type="file" name="image" class="form-control">
                <?php if (!empty($item['image'])): ?><img src="<?= image_url($item['image']) ?>" class="thumb mt-2"><?php endif; ?>
            </div>
            <div class="col-md-6">
                <label class="form-label">Orden</label>
                <input type="number" name="sort_order" class="form-control" value="<?= (int)($item['sort_order'] ?? 0) ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Testimonio / frase</label>
                <textarea name="quote" class="form-control" rows="3" required><?= e($item['quote'] ?? '') ?></textarea>
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
            <a href="<?= base_url('/admin/testimonials') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
