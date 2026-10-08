<h2 class="mb-4">Configuración del sitio</h2>

<div class="card p-4">
    <form method="post" action="<?= base_url('/admin/settings/store') ?>">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre del sitio</label>
                <input type="text" name="site_name" class="form-control" value="<?= e($settingsForm['site_name'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Eslogan / etiqueta</label>
                <input type="text" name="site_tagline" class="form-control" value="<?= e($settingsForm['site_tagline'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Dirección</label>
                <input type="text" name="address" class="form-control" value="<?= e($settingsForm['address'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Teléfono principal</label>
                <input type="text" name="phone" class="form-control" value="<?= e($settingsForm['phone'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Teléfono secundario</label>
                <input type="text" name="phone_2" class="form-control" value="<?= e($settingsForm['phone_2'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= e($settingsForm['email'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="<?= e($settingsForm['facebook'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Twitter</label>
                <input type="text" name="twitter" class="form-control" value="<?= e($settingsForm['twitter'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="<?= e($settingsForm['instagram'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" value="<?= e($settingsForm['linkedin'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">URL del mapa embebido (Google Maps &gt; Compartir &gt; Insertar mapa &gt; copiar el "src" del iframe)</label>
                <input type="text" name="map_embed_url" class="form-control" value="<?= e($settingsForm['map_embed_url'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">URL del video institucional (Youtube)</label>
                <input type="text" name="video_url" class="form-control" value="<?= e($settingsForm['video_url'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Texto "sobre nosotros" del pie de página</label>
                <textarea name="footer_about" class="form-control" rows="4"><?= e($settingsForm['footer_about'] ?? '') ?></textarea>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
</div>
