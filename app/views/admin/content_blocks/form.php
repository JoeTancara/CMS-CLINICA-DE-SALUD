<h2 class="mb-4">Editar: <?= e($label) ?></h2>
<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/content-blocks/store') ?>" enctype="multipart/form-data">
        <input type="hidden" name="block_key" value="<?= e($item['block_key']) ?>">
        <input type="hidden" name="current_image" value="<?= e($item['image'] ?? '') ?>">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Subtítulo (etiqueta pequeña)</label>
                <input type="text" name="subtitle" class="form-control" value="<?= e($item['subtitle'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Imagen / video (opcional, según la sección)</label>
                <input type="file" name="image" class="form-control">
                <?php if (!empty($item['image'])): ?><div class="form-text">Archivo actual: <?= e($item['image']) ?></div><?php endif; ?>
            </div>
            <div class="col-12">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" value="<?= e($item['title'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Texto / párrafo</label>
                <textarea name="body" class="form-control" rows="5"><?= e($item['body'] ?? '') ?></textarea>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('/admin/content-blocks') ?>" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
