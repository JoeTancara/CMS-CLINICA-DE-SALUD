<h2 class="mb-4">Detalle del mensaje</h2>
<div class="card p-4" style="max-width: 700px;">
    <dl class="row mb-0">
        <dt class="col-sm-3">Tipo</dt><dd class="col-sm-9"><?= e($item['type']) ?></dd>
        <dt class="col-sm-3">Nombre</dt><dd class="col-sm-9"><?= e($item['name']) ?></dd>
        <dt class="col-sm-3">Email</dt><dd class="col-sm-9"><?= e($item['email'] ?? '') ?></dd>
        <dt class="col-sm-3">Teléfono</dt><dd class="col-sm-9"><?= e($item['phone'] ?? '') ?></dd>
        <?php if (!empty($item['gender'])): ?><dt class="col-sm-3">Género</dt><dd class="col-sm-9"><?= e($item['gender']) ?></dd><?php endif; ?>
        <?php if (!empty($item['birthdate'])): ?><dt class="col-sm-3">Fecha de nac.</dt><dd class="col-sm-9"><?= e($item['birthdate']) ?></dd><?php endif; ?>
        <?php if (!empty($serviceTitle)): ?><dt class="col-sm-3">Servicio</dt><dd class="col-sm-9"><?= e($serviceTitle) ?></dd><?php endif; ?>
        <?php if (!empty($item['subject'])): ?><dt class="col-sm-3">Asunto</dt><dd class="col-sm-9"><?= e($item['subject']) ?></dd><?php endif; ?>
        <dt class="col-sm-3">Mensaje</dt><dd class="col-sm-9"><?= nl2br(e($item['message'] ?? '')) ?></dd>
        <dt class="col-sm-3">Fecha</dt><dd class="col-sm-9"><?= e($item['created_at']) ?></dd>
    </dl>
</div>
<a href="<?= base_url('/admin/messages') ?>" class="btn btn-outline-secondary mt-3">Volver</a>
