<h2 class="mb-4">Textos de páginas</h2>
<p class="text-muted">Edita los títulos y párrafos que aparecen en las distintas secciones del sitio.</p>
<div class="card p-3">
    <table class="table align-middle">
        <thead><tr><th>Sección</th><th>Título actual</th><th></th></tr></thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= e($item['label']) ?></td>
                    <td><?= e(excerpt($item['title'] ?? '', 60)) ?></td>
                    <td class="text-end">
                        <a href="<?= base_url('/admin/content-blocks/edit/' . $item['block_key']) ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
