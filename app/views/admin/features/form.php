<h2 class="mb-4"><?= $item ? 'Editar característica' : 'Nueva característica' ?></h2>
<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/features/store') ?>">
        <?php if ($item): ?><input type="hidden" name="id" value="<?= (int)$item['id'] ?>"><?php endif; ?>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Ícono (Font Awesome, ej: fa-heart)</label>
                <input type="text" name="icon" class="form-control" value="<?= e($item['icon'] ?? 'fa-heart') ?>">
            </div>
            <div class="col-md-8">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" required value="<?= e($item['title'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Descripción</label>
                <textarea name="description" class="form-control" rows="3"><?= e($item['description'] ?? '') ?></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Orden</label>
                <input type="number" name="sort_order" class="form-control" value="<?= (int)($item['sort_order'] ?? 0) ?>">
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
            <a href="<?= base_url('/admin/features') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
