<h2 class="mb-4"><?= $item ? 'Editar slide' : 'Nuevo slide' ?></h2>
<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/slides/store') ?>" enctype="multipart/form-data">
        <?php if ($item): ?>
            <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
            <input type="hidden" name="current_image" value="<?= e($item['image']) ?>">
        <?php endif; ?>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Imagen de fondo <?= $item ? '' : '(obligatoria)' ?></label>
                <input type="file" name="image" class="form-control" <?= $item ? '' : 'required' ?>>
                <?php if (!empty($item['image'])): ?><img src="<?= image_url($item['image']) ?>" class="thumb mt-2"><?php endif; ?>
            </div>
            <div class="col-md-6">
                <label class="form-label">Subtítulo (etiqueta pequeña)</label>
                <input type="text" name="subtitle" class="form-control" value="<?= e($item['subtitle'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Título grande</label>
                <input type="text" name="title" class="form-control" value="<?= e($item['title'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Descripción / frase</label>
                <textarea name="description" class="form-control" rows="3"><?= e($item['description'] ?? '') ?></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Texto del botón</label>
                <input type="text" name="button_text" class="form-control" value="<?= e($item['button_text'] ?? 'Reserva tu cita') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Enlace del botón</label>
                <input type="text" name="button_link" class="form-control" value="<?= e($item['button_link'] ?? '/contacto') ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Orden</label>
                <input type="number" name="sort_order" class="form-control" value="<?= (int)($item['sort_order'] ?? 0) ?>">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="status" <?= (!$item || $item['status']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status">Visible</label>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('/admin/slides') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
