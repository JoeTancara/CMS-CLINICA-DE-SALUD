<h2 class="mb-4"><?= $item ? 'Editar servicio' : 'Nuevo servicio' ?></h2>

<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/services/store') ?>" enctype="multipart/form-data">
        <?php if ($item): ?>
            <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
            <input type="hidden" name="current_image" value="<?= e($item['image']) ?>">
        <?php endif; ?>

        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" required value="<?= e($item['title'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Slug (URL, opcional)</label>
                <input type="text" name="slug" class="form-control" placeholder="se genera automático" value="<?= e($item['slug'] ?? '') ?>">
            </div>
            <div class="col-md-8">
                <label class="form-label">Descripción corta (se muestra en las tarjetas de la lista)</label>
                <textarea name="short_description" class="form-control" rows="3"><?= e($item['short_description'] ?? '') ?></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Imagen de la tarjeta</label>
                <input type="file" name="image" class="form-control">
                <?php if (!empty($item['image'])): ?>
                    <img src="<?= image_url($item['image']) ?>" class="thumb mt-2">
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <label class="form-label">Ícono (Font Awesome, ej: fa-diagnoses)</label>
                <input type="text" name="icon" class="form-control" value="<?= e($item['icon'] ?? 'fa-diagnoses') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Orden</label>
                <input type="number" name="sort_order" class="form-control" value="<?= (int)($item['sort_order'] ?? 0) ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="status" <?= (!$item || $item['status']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status">Visible en el sitio</label>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Contenido de la página de detalle (HTML permitido: títulos, listas, párrafos)</label>
                <textarea name="content" class="form-control" rows="16" style="font-family: monospace;"><?= e($item['content'] ?? '') ?></textarea>
                <div class="form-text">Este contenido se muestra tal cual en la página del servicio. Puedes usar etiquetas HTML (h1, p, ul, li, etc.) igual que en el resto del sitio.</div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('/admin/services') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
